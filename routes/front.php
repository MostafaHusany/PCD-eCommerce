<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Shop',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Route::get('/', 'HomeController@index');
    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', 'ShopController@index');
        Route::get('/{slug}', 'ShopController@show')->name('product.detail');
    });
    Route::get('category/{id}', 'CategoryController@category')->name('category');

    Route::get('add_to_cart','CartController@add_to_cart')->name('add_to_cart');
    Route::get('cart_destroy/{id}','CartController@cart_destroy')->name('cart_destroy');
    Route::get('cart','CartController@cart')->name('cart');
});
