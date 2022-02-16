<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Product;
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
    public function update_quantity($quantity, $row_Id)
    {
        Cart::update($row_Id, $quantity);
            $totalPrice =  Cart::subtotal();
            $items = Cart::content();
            return response()->json(['items_count' => $items, 'totalPrice' => $totalPrice ,"row_Id" => $row_Id]);
    }


}
