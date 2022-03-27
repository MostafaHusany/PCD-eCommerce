<?php

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Shop',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/products', 'ShopController@products')->name('products');
    Route::get('pagination/fetch_data', 'ShopController@fetch_data');
    Route::get('pagination/category', 'ShopController@category');

    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', 'ShopController@index');
        Route::get('/{slug}', 'ShopController@show')->name('product.detail');
    });
    Route::get('category/{id}', 'CategoryController@category')->name('category');
    Route::post('brand_filter/', 'CategoryController@brand_filter')->name('brand_filter');
    Route::post('option_filter/', 'CategoryController@option_filter')->name('option_filter');
    Route::post('/search', 'CategoryController@Search')->name('search');

    Route::get('add_to_cart', 'CartController@add_to_cart')->name('add_to_cart');
    Route::get('shipping_price', 'CartController@shipping_price')->name('shipping_price');
    Route::get('cart_destroy/{id}', 'CartController@cart_destroy')->name('cart_destroy');
    Route::get('cart', 'CartController@cart')->name('cart');
    Route::get('update_quantity/{quantity}/{row_id}', 'CartController@update_quantity');
    Route::get('/cart_destroy_item/{row_id}', 'CartController@cart_destroy')->name('cart_destroy');
    Route::get('/checkout', 'CartController@checkout')->name('checkout');
    Route::post('/create_order', 'CartController@create_order')->name('store.order');


    Route::post('/promoApply', 'CartController@promoApply')->name('promoApply');



    Route::get('Login', 'UserController@Login')->name('Login');
    Route::get('register', 'UserController@register')->name('register');
    Route::get('register', 'UserController@register')->name('front.register');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('/profile/password', 'UserController@update_password')->name('update_password')->middleware('auth');
    Route::post('/my_account', 'UserController@update_profile')->name('update_profile');
    Route::get('forget-password', 'UserController@showForgetPasswordForm')->name('forget.password.get');
    Route::post('forget-password', 'UserController@submitForgetPasswordForm')->name('forget.password.post');
    Route::get('reset-password/{token}', 'UserController@showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'UserController@submitResetPasswordForm')->name('reset.password.post');
    Route::get('order-details/{id}', 'UserController@orderDetails')->name('order.details');

    Route::post('uploadInvoices', 'PaymentController@uploadInvoices')->name('uploadInvoices');

    Route::get('add-to-favorite/{id}', 'FavoriteController@addToFavorite')->name('add-to-favorite');
    Route::get('remove_favorite/{id}', 'FavoriteController@remove_favorite')->name('remove_favorite');
    Route::get('wishlist', 'FavoriteController@wishlist')->name('wishlist');

    Route::get('thanks', function () {
        $order = Order::orderBy('id', 'desc')->first();
        return view('shop.thanks', compact('order'));
    })->name('thanks');
});
