<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'ShopApi'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('phone-login', 'AuthController@phoneLogin');
    Route::post('register', 'AuthController@register');
    Route::put('update-me', 'AuthController@updateAccount');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::get('countries', 'AuthController@countries');
    Route::get('phone-code', 'AuthController@requestPhoneCode');
    Route::get('my-orders', 'AuthController@getOrders');
    Route::get('my-orders/{id}', 'AuthController@showOrder');
});

Route::group(['namespace' => 'ShopApi'], function () {
    /**
     * # ShopController ... 
     * Get products, categories and do products filtration
     * 
     * # CartController 
     * Get cart content, add product, remove, edit quantityt and clear.
     * 
     * # UserController ... 
     * get user data, update data, show orders, 
     */
    
    // ShopController
    Route::get('categories', 'ShopController@get_categories');
    Route::get('products', 'ShopController@search_all_products');
    Route::get('products/{slug}', 'ShopController@get_products_by_category');
    Route::get('product/{slug}', 'ShopController@show');

    // CartController
    // Route::get('cart', 'CartController@get_cart');
    Route::post('cart/{id}', 'CartController@add_product');
    // Route::delete('cart', 'CartController@clear_cart');
    // Route::delete('cart/{cart_item_id}', 'CartController@remove_product');

    // OrdersController 
    /**
     * Order 
     * make order
     * use promo code
     * upload order payment
     * OrdersController
     */
    Route::get('shippings', 'OrdersController@get_shipping');
    Route::post('order', 'OrdersController@create_order')->middleware('auth:api');
    Route::post('promo', 'OrdersController@add_promo');
    Route::post('payment-invoice', 'OrdersController@uploadInvoive');
    Route::delete('promo', 'OrdersController@clear_promo');

    // get theme data
    Route::get('theme', 'ThemesController@getHomeTheme');
    Route::get('nav-links', 'ThemesController@getNavbarLinks');
});