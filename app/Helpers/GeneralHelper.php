<?php

use App\Brand;
use App\CategoryAttribute;
use App\Favorite;
use App\Product;
use App\OrderStatus;
use App\ProductCategory;
use App\ProductCustomeField;
use Illuminate\Support\Facades\Auth;

define('PAGINATION_COUNT', 12);
define('CACHE_TIME', 3600);


if (!function_exists('order_status')) {
    function order_status() {
        return OrderStatus::get_status();
    }
}

if (!function_exists('categories')) {
    function categories()
    {
        return ProductCategory::where('is_main','1')->get();
    }
}

if (!function_exists('nav_categories')) {
    function nav_categories()
    {
        return ProductCategory::where('is_nav', 1)->get();
    }
}

if (!function_exists('get_lang')) {
    function get_lang()
    {
        return app()->getLocale();
    }
}

if (!function_exists('items_count')) {
    function items_count()
    {
        $cartCollection = Cart::content();
        return $cartCollection->count();
    }
}

if (!function_exists('totalPrice')) {
    function totalPrice()
    {
        return Cart::subtotal();
    }
}

if (!function_exists('cartContent')) {
    function cartContent()
    {
        return Cart::content();
    }
}

if (!function_exists('product_details')) {
    function product_details($id)
    {
        return Product::findOrFail($id);
    }
}

if (!function_exists('name')) {
    function name($id)
    {
       $product = Product::findOrFail($id);
        if(get_lang() == 'ar'){
        return    $product->ar_name ;
        }
        elseif(get_lang()== 'en'){
            return   $product->en_name ;
        }
    }
}

if (!function_exists('title')) {
    function title($id)
    {
       $category = ProductCategory::findOrFail($id);
        if(get_lang() == 'ar'){
        return    $category->ar_title ;
        }
        elseif(get_lang()== 'en'){
            return   $category->en_title ;
        }
    }
}

if (!function_exists('description')) {
    function description($id)
    {
       $product = Product::findOrFail($id);
        if(get_lang() == 'ar'){
        return    $product->ar_description ;
        }
        elseif(get_lang()== 'en'){
            return   $product->en_description ;
        }
    }
}

if (!function_exists('small_description')) {
    function small_description($id)
    {
       $product = Product::findOrFail($id);
        if(get_lang() == 'ar'){
        return    $product->ar_small_description ;
        }
        elseif(get_lang()== 'en'){
            return   $product->en_small_description ;
        }
    }
}

if (!function_exists('category_attributes')) {
    function category_attributes()
    {
        return CategoryAttribute::get();
    }
}

if (!function_exists('product_custome_fields')) {
    function product_custome_fields()
    {
        return ProductCustomeField::get();
    }
}

if (!function_exists('meta')) {
    function meta($meta)
    {
        return (array) Json_decode($meta)
        ;
    }
}

if (!function_exists('checkFavorite')) {
    function checkFavorite($product_id)
    {
        return Favorite::where('product_id',$product_id)->where('user_id',Auth()->user()->id)->first();
    }
}

if (!function_exists('brands')) {
    function brands()
    {
        return Brand::get();
    }
}

if(!function_exists('upload_image'))
{
    function upload_image($file, $prefix)
    {
        if($file){
            $files = $file;
            $imageName = $prefix.rand(3,999).'-'.time().'.'.$files->extension();
            $image = "storage/".$imageName;
            $files->move(public_path('storage'), $imageName);
            $getValue = $image;
            return $getValue;
        }
    }
}