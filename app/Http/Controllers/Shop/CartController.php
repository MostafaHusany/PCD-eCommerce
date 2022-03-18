<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Cart;

use App\Fee;
use App\Taxe;
use App\Order;
use App\Payment;
use App\Product;
use App\Address;
use App\Shipping;
use App\OrderProduct;

use App\Traits\MakeOrder;

class CartController extends Controller
{
    use MakeOrder;

    public function add_to_cart(Request $request)
    {

        $product_quantity = Product::find($request->id)->quantity;
        if ($product_quantity < $request->quantity) {
            $cartCollection = Cart::content();
            $items_count = $cartCollection->count();
            $totalPrice = Cart::subtotal();
            return response()->json([
                'status' => 'error', 'items_count' => $items_count, 'cartCollection' => $cartCollection,
                'totalPrice' => $totalPrice
            ]);
        } else {
            $cart = Cart::add($request->id, $request->ar_name, $request->quantity, $request->price);
            $cartCollection = Cart::content();
            $items_count = $cartCollection->count();
            $totalPrice = Cart::subtotal();
            return response()->json([
                'success' => 'success', 'items_count' => $items_count, 'cartCollection' => $cartCollection,
                'totalPrice' => $totalPrice
            ]);
        }
    }

    public function cart_destroy($itemId)
    {
        Cart::remove($itemId);
        $cartCollection = Cart::content();
        $items_count = $cartCollection->count();
        $totalPrice = Cart::subtotal();
        return response()->json(['success' => 'deleted', 'items_count' => $items_count, 'totalPrice' => $totalPrice]);
    }

    public function cart()
    {
        $totalPrice = Cart::subtotal();
        $shippings    = Shipping::where('is_active', '1')->get();
        return view('shop.cart', compact('totalPrice', 'shippings'));
    }
    
    public function update_quantity($quantity, $row_Id)
    {
        Cart::update($row_Id, $quantity);
        $totalPrice =  Cart::subtotal();
        $items = Cart::content();
        return response()->json(['items_count' => $items, 'totalPrice' => $totalPrice, "row_Id" => $row_Id]);
    }

    public function checkout()
    {
        $addresses = Address::where('user_id', Auth()->user()->id)->get();
        $shippings    = Shipping::where('is_active', '1')->get();
        $taxes = Taxe::where('is_active', '1')->get();
        $fees = Fee::where('is_active', '1')->get();
        $taxes_cost = Taxe::where('is_active', '1')->pluck('cost')->toArray();
        foreach ($taxes_cost as $tax) {
            $new_times[] = $tax * Cart::count();
        }
        $taxes_sum = array_sum($new_times);

        $fees_cost = Fee::where('is_active', '1')->pluck('cost')->toArray();
        foreach ($fees_cost as $fee) {
            $all_fees[] = $fee * Cart::count();
        }
        $fees_sum = array_sum($all_fees);
        return view('shop.checkout', compact('addresses', 'shippings', 'taxes', 'fees', 'taxes_sum', 'fees_sum'));
    }

    public function shipping_price(Request $request)
    {
        $data['get_cost'] = Shipping::find($request['val'])->get_cost();
        $data['id'] = Shipping::find($request['val'])->id;
        $taxes = Taxe::where('is_active', '1')->pluck('cost')->toArray();
        foreach ($taxes as $tax) {
            $new_times[] = $tax * Cart::count();
        }
        $taxes_sum = array_sum($new_times);
        $totalPrice = (int)Cart::subtotal();
        $data['totlal_price'] = $data['get_cost'] + $taxes_sum + $totalPrice;
        return response()->json($data);
    }

    public function create_order(OrderRequest $request)
    {
        // please use MakeOrder Trait here 
        
        // parse the atributes for create_customer_order method
        foreach (Cart::content() as $item) {
            $products_id[] = $item->id;
            $products_quantity[$item->id] = ['quantity' => $item->qty, 'price' => product_details($item->id)->price];
        }

        // create order data using MakeOrder::create_customer_order
        // we need to send the customer id not user id !!
        $order = $this->create_customer_order (auth()->user()->id, 
            [$request->shipping_id_field, 0, $request->shipping_price_field], 
            [$products_id, $products_quantity], []
        );

        // take address ...
        if ($request->address_id) {
            $order->address_id = $request->address_id;
        } else {
            $data               = $request->all();
            $data['user_id']    = auth()->user()->id;
            $address = Address::create($data);
            
            $order->address_id = $address->id;
        }

        // we will remove the payment and use the MakeOrder trait to create invoices
        // $payment = new Payment();
        // $payment->order_id = $order->id;
        // $payment->total =  $request->total_price;
        // if ($request->hasFile('payment_file')) {
        //     $payment->bank_transfer = upload_image($request->file('payment_file'), 'payment_file');
        // }
        // $payment->save();
        Cart::destroy();
        return view('shop.thanks');
    }
}


// {"products_id":["48","67"],
//     "products_quantity":{"48":{"quantity":1,"price":100},"67":{"quantity":1,"price":100}},
//     "products_prices":{"48":100,"67":100},
//     "restored_quantity":{"48":0,"67":0},
//     "taxes":[{"id":1,"title":"\u0636\u0631\u064a\u0628\u0629 \u062c\u062f\u0639\u0646\u0629 \u0645\u0646\u064a","cost":50,"is_fixed":0,"cost_type":1,"tax_total":100,"is_active":1}
//     ,{"id":2,"title":"\u0636\u0631\u064a\u0628\u0629 \u0627\u0644\u0642\u064a\u0645\u0629 \u0627\u0644\u0645\u0636\u0627\u0641\u0629","cost":15,"is_fixed":0,"cost_type":1,"tax_total":30,"is_active":1},
//     {"id":3,"title":"\u0627\u0644\u0636\u0631\u064a\u0628\u0629 \u0627\u0644\u062d\u0644\u0648\u0629 \u0627\u0644\u0634\u0642\u064a\u0629","cost":10,"is_fixed":1,"cost_type":1,"tax_total":20,"is_active":1}]
//     ,"fees":[{"id":2,"title":"fee 1","cost":15,"is_fixed":1,"cost_type":1,"fee_total":30,"is_active":1},
//     {"id":3,"title":"fee 2","cost":6.5,"is_fixed":0,"cost_type":0,"fee_total":13,"is_active":1}]}