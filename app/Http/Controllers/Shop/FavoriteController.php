<?php

namespace App\Http\Controllers\Shop;

use App\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorite($product_id){
        $user_id = auth()->user()->id;
        $favorite = Favorite::where('product_id',$product_id)->where('user_id',$user_id)->first();
        if($favorite){
            return response()->json(['error' => 'item is already favorite']);
        }else{
            $favorite = new Favorite();
            $favorite->product_id = $product_id;
            $favorite->user_id = $user_id;
            $favorite->save();
            return response()->json(['success' => 'item added to favorite']);
        }
    }

    public function wishlist(){
        $favorites = Favorite::where('user_id',Auth()->user()->id)->get();
        return view('shop.wishlist.index',compact('favorites'));
    }

    public function remove_favorite($product_id){
        $favorite = Favorite::where('product_id',$product_id)->where('user_id',Auth()->user()->id)->first();
        if($favorite){
            $favorite->delete();
            return response()->json(['success' => 'item deleted successfully']);
        }
    }
}
