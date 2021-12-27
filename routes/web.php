<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Cart::add('293ad', 'Product 1', 1, 9.99);
    // dd(Cart::content());
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

