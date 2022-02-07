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
        Route::get('/{slug}', 'ShopController@show');
    });
});
