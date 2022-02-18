<?php

use App\CategoryAttribute;
use App\Product;
use App\ProductCategory;
use App\ProductCustomeField;

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