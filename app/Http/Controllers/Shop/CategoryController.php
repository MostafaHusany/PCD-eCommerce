<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($id){
        $categoryProducts = ProductCategory::where('id', $id)->with('products')->first();
        return view ('shop.category', compact('categoryProducts'));
    }
}
