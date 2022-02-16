<?php

namespace App\Http\Controllers\shop;

use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($id){
        $categoryProducts = ProductCategory::where('id', $id)->with('products')->first();
        $products = $categoryProducts->products;
        return view ('shop.products', compact('categoryProducts','products'));
    }

    public function filter(Request $request){
        $attribute = $request->attribute;
        $data = Product::orderBy('id', 'desc');
        if($attribute != "0")
        {
            $category_ids = CategoryAttribute::where('id',$attribute)->pluck('category_id')
                             ->toArray();
             $data = $data->where('name', $attribute);
        }
     }
}
