<?php

namespace App\Http\Controllers\shop;

use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($id)
    {
        $categoryProducts = ProductCategory::where('category_id', $id)->get();
        $currentCategory = ProductCategory::where('id', $id)->first();
        $title = "category";
        if (isset($currentCategory->products)) {
            $products = $currentCategory->products;
            return view('shop.products', compact('categoryProducts', 'products', 'currentCategory', 'title'));
        }
        return view('shop.products', compact('categoryProducts', 'currentCategory', 'title'));
    }

    public function brand_filter(Request $request)
    {
        $brands = $request->brands;
        if ($brands) {
            $products = Product::whereIn('brand_id', $brands)->get();
            return view('shop.search', compact( 'products'));
        }else{
            return redirect()->back();
        }
    }

    public function option_filter(Request $request)
    {
        $attributes = [];
        if ($request->checkbox) {
            $options = $request->checkbox;
            foreach ($options as  $option) {
                $attributes[] = CategoryAttribute::where('meta', 'like', '%' . $option . '%')->get();
            }
        }
        if ($request->price_first) {
            $attributes[] = CategoryAttribute::where('meta', 'like', '%' . $request->price_first . '%')
                ->where('meta', 'like', '%' . $request->price_second . '%')->where('type', 'number')
                ->get();
        }
        if (count($attributes[0]) > 0) {



            foreach ($attributes as $attribute) {

                $categoryProducts[] = $attribute[0]->products_categories;
            }
            $categoryProducts  = array_unique($categoryProducts);
            $currentCategory  = array_unique($categoryProducts)[0];


            foreach (array_unique($categoryProducts) as $cat) {
                $products[] = $cat->products;
            }
            $title = "category";
            $products = $products[0];
            return view('shop.products', compact('categoryProducts', 'products', 'currentCategory', 'title'));
        } else {
            return redirect()->back();
        }
    }

    public function Search(Request $request)
    {
        $products = Product::where('ar_name', 'like', '%' . $request->search . '%')
            ->orWhere('ar_small_description',  'like', '%' . $request->search . '%')
            ->orWhere('ar_description',  'like', '%' . $request->search . '%')
            ->orWhere('en_name',  'like', '%' . $request->search . '%')
            ->orWhere('en_small_description',  'like', '%' . $request->search . '%')
            ->orWhere('en_description',  'like', '%' . $request->search . '%')->get();
            return view('shop.search', compact( 'products'));
    }
}
