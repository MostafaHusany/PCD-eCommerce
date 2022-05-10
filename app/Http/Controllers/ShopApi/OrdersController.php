<?php

namespace App\Http\Controllers\ShopApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use App\Traits\MakeOrder;

use Cart;
use App\Product;
use App\Shipping;
use App\PromoCode;

class OrdersController extends Controller
{
    use MakeOrder;

    public function create_order (Request $request) {
        $validator = Validator::make($request->all(), [
            'shipping_id' => ['required', 'exists:shippings,id'],
            'phone' => ''
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'not_valied_shipping']);
        }

        // validate the products in the cart  
        $is_not_valied = $this->is_valied_product();
        if (isset($is_not_valied)) {
            return response()->json($is_not_valied);
        }

        /**
         * # If the user is loged in .... 
         * get logged in user data 
         * else register the user and get the user
         * data for creating the order.
         */

        

        $products_id = [];
        $products_quantity = [];
        $products_promocode = Cart::instance('promo')->content()->first();
        
        // parse the atributes for create_customer_order method
        foreach (Cart::instance('products')->content() as $item) {
            $products_id[] = $item->id;
            $products_quantity[$item->id] = ['quantity' => $item->qty, 'price' => product_details($item->id)->price];
        }

        foreach (Cart::instance('products')->content() as $item) {
            $products_id[] = $item->id;
            $products_quantity[$item->id] = ['quantity' => $item->qty, 'price' => product_details($item->id)->price];
        }

        $shipping_id_field = 1; // delete me and get my value from the request
        $shipping_price_field = 100; // delete me and get my value from the request
        $target_shipping = Shipping::find($request->shipping_id);
        
        // create order data using MakeOrder::create_customer_order
        // we need to send the customer id not user id !!
        $order = $this->create_customer_order(
            15,// customer id
            [$target_shipping->id, $target_shipping->is_free_taxes, $target_shipping->cost],
            [$products_id, $products_quantity],
            [],
            isset($products_promocode) ? $products_promocode->name : null
        );

        // if every thing is fine clear the cart
        if (isset($order)) {
            Cart::instance('products')->destroy();
            Cart::instance('promo')->destroy();
        }


        return response()->json(array('data' => $order, 'success' => isset($order)));

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
        
        if (!$this->is_cart_has_promo($request->code)) {
            // clear old promo so the user can't use more than one promo
            Cart::instance('promo')->destroy();

            // get promo record
            $target_promo = PromoCode::where('code', $request->code)->where('is_active', '1')->first(); 
            
            // add the promo record to the cart session
            Cart::instance('promo')->add($target_promo->id, $target_promo->code, 1, $target_promo->value);//->associate('App\PromoCode');
        }

        return response()->json(array('data' => Cart::instance('promo')->content(), 'success' => isset($target_promo)));
    }

    public function clear_promo () {
        Cart::instance('promo')->destroy();

        return response()->json(array('data' => Cart::instance('promo')->content(), 'success' => true));
    }


    // START HELPER METHODS
    private function is_valied_product () {
        $products_id = [];
        
        if (sizeof(Cart::instance('products')->content())) {
            foreach (Cart::instance('products')->content() as $item) {
                $products_id[] = $item->id;
            }
        }

        // if length is zero this mean there is no products 
        if (!sizeof($products_id)) {
            return array('data' => null, 'success' => false, 'msg' => 'no_products_on_cart');
        }
        
        $non_valied_products = Product::whereIn('id', $products_id)->where('quantity', 0)->get();
        if(sizeof($non_valied_products)) {
            return array('data' => $non_valied_products, 'success' => false, 'msg' => 'not_valied_qty');
        }

        return null;
    }

    private function is_cart_has_promo ($code) {
        $is_has_item = Cart::instance('promo')->search(function ($cartItem, $rowId) use ($code) {
            return $cartItem->name == $code;
        })->first();

        return isset($is_has_item);
    }

    public function clear_cart () {
        Cart::instance('products')->destroy();
        
        return response()->json(['data' => $this->cart_content(), 'success' => true]);
    }
}
