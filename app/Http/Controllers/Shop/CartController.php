<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request){

        $cart = Cart::add($request->id, $request->ar_name, $request->quantity, $request->price);
        $cartCollection =Cart::content();
        $items_count = $cartCollection->count();
        $totalPrice = Cart::subtotal();
        return response()->json([
            'success' => 'success', 'items_count' => $items_count, 'cartCollection' => $cartCollection,
            'totalPrice' => $totalPrice
        ]);
    }

    public function cart_destroy($itemId)
    {
        Cart::remove($itemId);
        $cartCollection = Cart::content();
        $items_count = $cartCollection->count();
        $totalPrice = Cart::subtotal();
        return response()->json(['success' => 'deleted', 'items_count' => $items_count, 'totalPrice' => $totalPrice]);
    }

    public function cart(){
        $totalPrice = Cart::subtotal();

        return view ('shop.cart',compact('totalPrice'));
    }
}
