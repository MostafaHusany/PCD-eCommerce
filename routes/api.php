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
    'namespace' => 'customer'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});


Route::group(['namespace' => 'shopApi'], function () {
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
    
    Route::get('products', 'ShopController@search_all_products');
    Route::get('products/{slug}', 'ShopController@get_products_by_category');
    Route::get('product/{slug}', 'ShopController@show');

    Route::get('categories', 'ShopController@get_categories');
});