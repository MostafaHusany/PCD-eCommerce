<?php

namespace App\Http\Controllers\ShopApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use App\Traits\MakeOrder;

use Cart;
use App\Product;
use App\Invoice;
use App\Shipping;
use App\PromoCode;

class OrdersController extends Controller
{
    use MakeOrder;

    /**
     * # How to create a new order, we need to understand 
     * that with react there is no access to the cart session any more ...
     * 
     * We replaced the server side cart, with a localhost cart for the customer,
     * than when the user make an order request we need him to send his cart
     * data with the request.
     * 
     * # Order creation cylce
     * 0- if there is a valied promo we can validate the promo first before 
     * the user sends the order request.
     *  
     * 1- the user send an order request with the cart data in the request
     * and the shipping service he apply for.
     * 2- validate the cart data, and the promo-code if exits.
     * 3- if valied create order, else send validation error message
     * 
    */

    public function get_shipping () {
        $all_shippings = Shipping::all();
        
        return response()->json(array('data' => $all_shippings, 'success' => isset($all_shippings)));
    }

    public function create_order (Request $request) {
        $validator = Validator::make($request->all(), [
            'shipping_id' => ['required', 'exists:shippings,id'],
            'phone' => '',
            'cartItems' => ['required'],
            
            'country_id' => ['required', 'exists:districts,id'],
            'gove_id'    => ['required', 'exists:districts,id'],
            'address'    => ['required'],
            'code'       => isset($request->code) && strlen($request->code) ? ['exists:promo_codes,code',
                Rule::exists('promo_codes')->where(function ($query) use ($request) {
                    return $query->where('code', $request->code)->where('is_active', 1);
                })
            ] : []
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }
        // if ($validator->fails()) {
        //     return response()->json(['data' => null, 'success' => false, 'msg' => 'not_valied_shipping']);
        // }

        // validate the products in the cart  
        [$is_not_valied, $validation_result] = $this->is_valied_product($request->cartItems);
        if ($is_not_valied) {
            return response()->json($validation_result);
        }

        /**
         * # If the user is loged in .... 
         * get logged in user data 
         * else register the user and get the user
         * data for creating the order.
         */
        $products_id       = $validation_result[0];
        $products_quantity = $validation_result[1];

        $target_shipping   = Shipping::find($request->shipping_id);

        // update customer address
        // store customer address
        $target_customer = auth('api')->user()->customer;
        $target_customer->country_id = $request->country_id;
        $target_customer->gove_id = $request->gove_id;
        $target_customer->address = $request->address;
        $target_customer->save();

        // create order data using MakeOrder::create_customer_order
        // we need to send the customer id not user id !!
        $order = $this->create_customer_order(
            auth('api')->user()->customer->id,// customer id
            [$target_shipping->id, $target_shipping->is_free_taxes, $target_shipping->cost],
            [$products_id, $products_quantity],
            [],
            isset($request->code) ? $request->code : null
        );

        // if every thing is fine clear the cart
        if (isset($order)) {
            Cart::instance('products')->destroy();
            Cart::instance('promo')->destroy();
        }

        return response()->json(array('data' => $order, 'success' => isset($order)));
    }

    public function uploadInvoive (Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id'     => ['required', 'exists:orders,id'],
            'payment_file' => ['required', 'image', 'max:10240'],
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => $validator->errors()]); 
        }

        $invoice = Invoice::where('order_id', $request->order_id)->first();
        $invoice->status           = 'check_payment_transaction';
        // $invoice->trasnaction_imge = upload_image($request->file('payment_file'), 'payment_file/');

        $main_image = $request->file('payment_file');
        $main_image->store('/public/payment_files');
        $invoice->trasnaction_imge = 'storage/payment_files/' . $main_image->hashName(); 

        $invoice->save();

        return response()->json(array('data' => $invoice, 'success' => isset($invoice)));
    }

    public function add_promo (Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => ['required', 'exists:promo_codes,code',
                Rule::exists('promo_codes')->where(function ($query) use ($request) {
                    return $query->where('code', $request->code)->where('is_active', 1);
                })
            ]
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'not_valied_promocode']);
        }
        
        $target_promo = PromoCode::where('code', $request->code)->where('is_active', 1)->first();

        return response()->json(array('data' => $target_promo, 'success' => isset($target_promo)));
    }

    // START HELPER METHODS
    private function is_valied_product ($cartItems) {
        /**
         * Get cart data and loop in the requested products 
         * check if the product is active and still exist in the storage
         * if no return validation error
         */
        $products_id = [];
        $products_quantity = [];
        
        foreach ($cartItems as $item) {
            /***
             *  [
                    2022 => [
                        "quantity" => 1,
                        "upgrade_options" => {"4":151,"8":385},
                        "upgrade_options_list" => [151,385]
                    ]
                ]
             */
            $products_id[] = $item['id'];
            $products_quantity[$item['id']] = [
                'quantity'             => $item['quantity'],
                'upgrade_options'      => isset($item['upgrade_options']) ? $item['upgrade_options'] : null,
                'upgrade_options_list' => isset($item['upgrade_options_list']) ? $item['upgrade_options_list'] : null,
            ];   
        }
        
        // dd($products_quantity);
        // if length is zero this mean there is no products 
        // if (!sizeof($products_id)) {
        //     return array('data' => null, 'success' => false, 'msg' => 'no_products_on_cart');
        // }
        
        // get the products that has no valied quantity in the storage
        $requested_products = Product::whereIn('id', $products_id)->get();
        
        // valiedate that the product has quantity
        $is_not_valied     = false;
        $validation_result = ['not_valied' => [], 'finshed_from_storage' => [], 'not_valied_quantity' => [], 'not_valied_upgrade_quantity' => []];
        foreach ($requested_products as $product) {
            

            if ($product->is_composite == 2) {
                $upgradeProducts = Product::whereIn('id', $products_quantity[$product->id]['upgrade_options_list'])
                    ->where('quantity', '=', 0)
                    ->count();

                if ($upgradeProducts) {
                    $is_not_valied = true;
                    $validation_result['not_valied_upgrade_quantity'][$product->id] = $upgradeProducts;   
                }
            }

            // product is not valied
            if ($product->is_active == 0) {
                $is_not_valied = true;
                $validation_result['not_valied'][] = $product;
            }   

            // product dosen't have quantity in the storage 
            else if ($product->quantity == 0) {
                $is_not_valied = true;
                $validation_result['finshed_from_storage'][] = $product;
            }

            // product dosen't have requested quantity 
            else if ($product->quantity < $products_quantity[$product->id]['quantity']) {
                $is_not_valied = true;
                $validation_result['not_valied_quantity'][] = $product;
            }

            else {
                $products_quantity[$product->id]['price'] = $product->price;
            }
        }

        return [
            $is_not_valied, 
            $is_not_valied ? 
            array('data' => $validation_result, 'success' => false, 'msg' => 'not_valied_product') 
                :
            [$products_id, $products_quantity]
        ];
    }

}
