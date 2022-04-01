<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\shop\OrderRequest;
use App\Http\Requests\shop\PromoRequest;

use Session;
use Cart;

use App\User;
use App\Fee;
use App\Taxe;
use App\Order;
use App\Payment;
use App\Product;
use App\Address;
use App\Customer;
use App\Shipping;
use App\OrderProduct;
use App\PromoCode;
use App\Traits\MakeOrder;

use GuzzleHttp\Handler\Proxy;

class CartController extends Controller
{
    use MakeOrder;

    public function add_to_cart(Request $request)
    {
        $product_quantity = Product::find($request->id)->quantity;
        // get product categories to check rule for every category
        $product_cat = Product::find($request->id)->categories;
        foreach ($product_cat as $cat) {
            // if product cate don't have rule
            if ($cat->rule == '0') {
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
                // if product category has rule
            } else {
                // if cart has iteams
                if (count(Cart::content()) > 0) {
                    // loop in cart items 
                    foreach (Cart::content() as $item) {
                        // if iteam in cart
                        if ((int)$request->id == (int)$item->id) {
                            // if total required quantity for item plus item in cart quantity greater than rule 
                            // can't push in cart 
                            if ((int)$request->quantity + $item->qty > $cat->rule) {
                                $cartCollection = Cart::content();
                                $items_count = $cartCollection->count();
                                $totalPrice = Cart::subtotal();
                                return response()->json([
                                    'status' => 'errorRuleQuantity', 'items_count' => $items_count,
                                    'cartCollection' => $cartCollection,
                                    'totalPrice' => $totalPrice
                                ]);
                                // if total required quantity for item plus item in cart quantity 
                                // less than rule  push in cart 
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
                        } else {

                            if ((int)$request->quantity > $cat->rule) {
                                $cartCollection = Cart::content();
                                $items_count = $cartCollection->count();
                                $totalPrice = Cart::subtotal();
                                return response()->json([
                                    'status' => 'errorRuleQuantity', 'items_count' => $items_count,
                                    'cartCollection' => $cartCollection,
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
                    }
                }
                // if cart is empty
                else {
                    if ((int)$request->quantity > $cat->rule) {
                        $cartCollection = Cart::content();
                        $items_count = $cartCollection->count();
                        $totalPrice = Cart::subtotal();
                        return response()->json([
                            'status' => 'errorRuleQuantity', 'items_count' => $items_count,
                            'cartCollection' => $cartCollection,
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
            }
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
        return view('shop.cart.index', compact('totalPrice', 'shippings'));
    }

    public function update_quantity($quantity, $row_Id)
    {
        Cart::update($row_Id, $quantity);
        $totalPrice =  Cart::subtotal();
        $items = Cart::content();
        return response()->json(['items_count' => $items, 'totalPrice' => $totalPrice, "row_Id" => $row_Id]);
    }

    public function checkout(Request $request)
    {
        $promoCodeValue = Session::get('promo');
        if ($promoCodeValue) {
            $promoCode = PromoCode::where('code', $promoCodeValue)->first();
        } else {
            $promoCode = [];
        }
        $user_id = Auth()->user();
        if ($user_id) {
            $addresses = Address::where('customer_id', Auth()->user()->customer->id)->get();
        } else {
            $addresses = [];
        }
        $shippings    = Shipping::where('is_active', '1')->get();
        $taxes = Taxe::where('is_active', '1')->get();
        $fees = Fee::where('is_active', '1')->get();
        $taxes_cost = Taxe::where('is_active', '1')->pluck('cost')->toArray();
        $new_times = [];
        foreach ($taxes_cost as $tax) {
            $new_times[] = $tax * Cart::count();
        }
        $taxes_sum = array_sum($new_times);

        $fees_cost = Fee::where('is_active', '1')->pluck('cost')->toArray();
        $all_fees = [];

        foreach ($fees_cost as $fee) {
            $all_fees[] = $fee * Cart::count();
        }
        $fees_sum = array_sum($all_fees);
        return view('shop.checkout.index', compact(
            'addresses',
            'shippings',
            'taxes',
            'fees',
            'taxes_sum',
            'fees_sum',
            'promoCode'
        ));
    }

    public function shipping_price(Request $request)
    {
        $data['get_cost'] = Shipping::find($request['val'])->get_cost();
        $data['id'] = Shipping::find($request['val'])->id;

        $taxes = Taxe::where('is_active', '1')->pluck('cost')->toArray();
        $new_times = [];
        foreach ($taxes as $tax) {
            $new_times[] = $tax * Cart::count();
        }
        $taxes_sum = array_sum($new_times);
        $totalPrice = (int) Cart::subtotal();
        $OrderTotalPrice = $data['get_cost'] + $taxes_sum + $totalPrice;
        $promoCode  = PromoCode::where('code', $request->promoCode)->first();
        if ($promoCode) {
            $data['promoType'] =  $promoCode->type;
            $data['promoValue'] =  $promoCode->value;
            if ($promoCode->type == 'percentage') {
                $data['totlal_price'] = $OrderTotalPrice - ($OrderTotalPrice * ($promoCode->value / 100));
            } elseif ($promoCode->type == 'fixed') {
                $data['totlal_price'] = $OrderTotalPrice - $promoCode->value;
            }
        } else {
            $data['totlal_price']  = $OrderTotalPrice;
        }
        return response()->json($data);
    }

    public function create_order(OrderRequest $request)
    {
        // dd($request->all());
        $check_auth = Auth()->user();
        // check if user not login 
        if (!$check_auth) {
            $user = User::where('phone', $request->phone)->first();
            // search for user by phon if exist return user id
            if ($user) {
                $user_id = $user->customer->id;
                Auth::loginUsingId($user_id);
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
            [],
            $request->promoCode
        );

        // take address ...
        if ($request->address_id) {
            $order->address_id = $request->address_id;
        } else {
            $data               = $request->all();
            $data['customer_id']    = $user_id;
            $address = Address::create($data);

            $order->address_id = $address->id;
        }

        Cart::destroy();
        session()->forget('promo');
        return redirect()->route('thanks');
    }

    public function thanks(Request $request)
    {
        $order = Order::where('customer_id', Auth()->user()->customer->id)->orderBy('id', 'desc')->first();
        return view('shop.checkout.thanks', compact('order'));
    }
    public function promoApply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promoCode'          => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => null, 'success' => 'validation', 'msg' => $validator->errors()]);
        }
        $promo = $request->promoCode;
        $promoCode = PromoCode::where('code', $promo)->where('is_active', '1')->first();
        if ($promoCode) {
            session()->put('promo', $promo);
            return response()->json(['data' =>  $promoCode, 'success' => true, 'msg' => $validator->errors()]);
        } else {
            return response()->json(['data' => null, 'success' => false, 'msg' => 'code not vaild']);
        }
    }
}
