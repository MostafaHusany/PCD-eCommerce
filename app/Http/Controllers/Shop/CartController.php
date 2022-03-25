<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\shop\OrderRequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Cart;

use App\Fee;
use App\Taxe;
use App\Order;
use App\Payment;
use App\Product;
use App\Address;
use App\Customer;
use App\Shipping;
use App\OrderProduct;

use App\Traits\MakeOrder;
use App\User;

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
        $user_id = Auth()->user();
        if ($user_id) {
            $addresses = Address::where('user_id', Auth()->user()->customer->id)->get();
        } else {
            $addresses = [];
        }
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
        $check_auth = Auth()->user();
        // check if user not login 
        if (!$check_auth) {
            $user = User::where('phone', $request->phone)->first();
            // search for user by phon if exist return user id
            if ($user) {

                $user_id = $user->customer->id;

            }
            // if not create new user
            else {
                $user =  User::create([
                    'name' => $request['first_name'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'password' => Hash::make($request['password']),
                ]);
                Auth::loginUsingId($user->id);
                $customer = new Customer();
                $customer->first_name =  $request['first_name'];
                $customer->second_name =  $request['last_name'];
                $customer->name =  $request['first_name'] . $request['last_name'];
                $customer->email =  $request['email'];
                $customer->phone =  $request['phone'];
                $customer->city =  $request['city'];
                $customer->plain_password =  $request['password'];
                $customer->address =  $request['address'];
                $customer->user_id  =  $user->id;
                $customer->save();
                $user_id = $customer->id;
            }
        } else {
            $user_id = auth()->user()->customer->id;
        }
        // please use MakeOrder Trait here 

        // parse the atributes for create_customer_order method
        foreach (Cart::content() as $item) {
            $products_id[] = $item->id;
            $products_quantity[$item->id] = ['quantity' => $item->qty, 'price' => product_details($item->id)->price];
        }
        // create order data using MakeOrder::create_customer_order
        // we need to send the customer id not user id !!
        $order = $this->create_customer_order(
            $user_id,
            [$request->shipping_id_field, 0, $request->shipping_price_field],
            [$products_id, $products_quantity],
            []
        );

        // take address ...
        if ($request->address_id) {
            $order->address_id = $request->address_id;
        } else {
            $data               = $request->all();
            $data['user_id']    = $user_id;
            $address = Address::create($data);

            $order->address_id = $address->id;
        }

        Cart::destroy();
        return view('shop.thanks', compact('order'));
    }
}
