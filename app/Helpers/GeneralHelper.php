<?php

use App\Product;
use App\ProductCategory;

if (!function_exists('categories')) {
    function categories()
    {
        return ProductCategory::where('is_main','1')->get();
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