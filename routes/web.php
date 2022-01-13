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

Route::group(['middleware' => 'auth:web', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::resource('users', 'UsersController', ['names' => [
        'index' => 'admin.users.index',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy'
        ]
    ]);

    Route::resource('customers', 'CustomerController', ['names' => [
        'index' => 'admin.customers.index',
        'store' => 'admin.customers.store',
        'show' => 'admin.customers.show',
        'edit' => 'admin.customers.edit',
        'update' => 'admin.customers.update',
        'destroy' => 'admin.customers.destroy'
        ]
    ]);

    Route::resource('products-categories', 'ProductCategoriesController', ['names' => [
        'index' => 'admin.products-categories.index',
        'store' => 'admin.products-categories.store',
        'show' => 'admin.products-categories.show',
        'edit' => 'admin.products-categories.edit',
        'update' => 'admin.products-categories.update',
        'destroy' => 'admin.products-categories.destroy'
        ]
    ]);

    Route::resource('products', 'ProductsController', ['names' => [
        'index'     => 'admin.products.index',
        'store'     => 'admin.products.store',
        'show'      => 'admin.products.show',
        'edit'      => 'admin.products.edit',
        'update'    => 'admin.products.update',
        'destroy'   => 'admin.products.destroy'
        ]
    ]);

    Route::resource('orders', 'OrdersController', ['names' => [
        'index'     => 'admin.orders.index',
        'store'     => 'admin.orders.store',
        'show'      => 'admin.orders.show',
        'edit'      => 'admin.orders.edit',
        'update'    => 'admin.orders.update',
        'destroy'   => 'admin.orders.destroy'
        ]
    ]);

    // fast ajax search
    Route::get('/customers-search', 'CustomerController@dataAjax');
    Route::get('/products-search', 'ProductsController@dataAjax');
    Route::get('/products-categories-search', 'ProductCategoriesController@dataAjax');
});

use Illuminate\Support\Facades\Mail;
use App\Mail\Customers\AccountActivation;

Route::get('test_mail', function () {
    Mail::to('mostafa.husany@goo.com')->send(new AccountActivation());
    return new AccountActivation();
});

Route::get('/home-sadas/asdasd', ['as' => 'home', function() {
    dd(str_contains(Request::path(), 'home'));
}]);