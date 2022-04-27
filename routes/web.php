<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Product;


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

// Route::get('/', function () {
//     // Cart::add('293ad', 'Product 1', 1, 9.99);
//     // dd(Cart::content());
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', function() {
    return redirect('admin/');
})->name('home');

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

    Route::resource('roles', 'RolesController', ['names' => [
        'index' => 'admin.roles.index',
        'store' => 'admin.roles.store',
        'show' => 'admin.roles.show',
        'edit' => 'admin.roles.edit',
        'update' => 'admin.roles.update',
        'destroy' => 'admin.roles.destroy'
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
    
    Route::resource('brands', 'BrandController', ['names' => [
        'index' => 'admin.brands.index',
        'store' => 'admin.brands.store',
        'show' => 'admin.brands.show',
        'edit' => 'admin.brands.edit',
        'update' => 'admin.brands.update',
        'destroy' => 'admin.brands.destroy'
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

    Route::resource('sold-products', 'SoldProductsController', ['names' => [
        'index'     => 'admin.sold_products.index',
        'store'     => 'admin.sold_products.store',
        'show'      => 'admin.sold_products.show',
        'edit'      => 'admin.sold_products.edit',
        'update'    => 'admin.sold_products.update',
        'destroy'   => 'admin.sold_products.destroy'
        ]
    ]);

    Route::resource('promotions', 'PromotionsController', ['names' => [
        'index'     => 'admin.promotions.index',
        'store'     => 'admin.promotions.store',
        'show'      => 'admin.promotions.show',
        'edit'      => 'admin.promotions.edit',
        'update'    => 'admin.promotions.update',
        'destroy'   => 'admin.promotions.destroy'
        ]
    ]);

    Route::resource('promo-codes', 'PromoCodesController', ['names' => [
        'index'     => 'admin.promo.index',
        'store'     => 'admin.promo.store',
        'show'      => 'admin.promo.show',
        'edit'      => 'admin.promo.edit',
        'update'    => 'admin.promo.update',
        'destroy'   => 'admin.promo.destroy'
        ]
    ]);

    Route::resource('shipping', 'ShippingController', ['names' => [
        'index'     => 'admin.shipping.index',
        'store'     => 'admin.shipping.store',
        'show'      => 'admin.shipping.show',
        'edit'      => 'admin.shipping.edit',
        'update'    => 'admin.shipping.update',
        'destroy'   => 'admin.shipping.destroy'
        ]
    ]);

    Route::resource('fees', 'FeesController', ['names' => [
        'index'     => 'admin.fees.index',
        'store'     => 'admin.fees.store',
        'show'      => 'admin.fees.show',
        'edit'      => 'admin.fees.edit',
        'update'    => 'admin.fees.update',
        'destroy'   => 'admin.fees.destroy'
        ]
    ]);

    Route::resource('taxes', 'TaxesController', ['names' => [
        'index'     => 'admin.taxes.index',
        'store'     => 'admin.taxes.store',
        'show'      => 'admin.taxes.show',
        'edit'      => 'admin.taxes.edit',
        'update'    => 'admin.taxes.update',
        'destroy'   => 'admin.taxes.destroy'
        ]
    ]);

    Route::resource('order-status', 'OrderStatusController', ['names' => [
        'index'     => 'admin.order_status.index',
        'store'     => 'admin.order_status.store',
        'show'      => 'admin.order_status.show',
        'edit'      => 'admin.order_status.edit',
        'update'    => 'admin.order_status.update',
        'destroy'   => 'admin.order_status.destroy'
        ]
    ]);

    Route::resource('invoices', 'invoicesController', ['names' => [
        // 'index'     => 'admin.invoices.index',
        // 'store'     => 'admin.invoices.store',
        'show'      => 'admin.invoices.show',
        // 'edit'      => 'admin.invoices.edit',
        'update'    => 'admin.invoices.update',
        // 'destroy'   => 'admin.invoices.destroy'
        ]
    ]);

    // dashboard
    Route::group([], function () {
        Route::get('/', 'DashboardController@index');
    });

    // theme editor
    
    Route::get('navbar', 'ThemeController@index');
    Route::group(['prefix' => 'theme'], function () {
    });

    // fast ajax search
    Route::get('/users-search', 'UsersController@dataAjax');
    Route::get('/customers-search', 'CustomerController@dataAjax');
    Route::get('/products-search', 'ProductsController@dataAjax');
    Route::get('/products-categories-search', 'ProductCategoriesController@dataAjax');
    Route::get('/fees-search', 'FeesController@dataAjax');
    Route::get('/shipping-search', 'ShippingController@dataAjax');
    Route::get('/brand-search', 'BrandController@dataAjax');

    Route::get('/test', function () {
        $tmp = User::first();
        dd($tmp->allPermissions());
        // $target = Product::find(65);
        
        // $target->has_promotion();
        // $target->get_promotion(); 
        // $target->get_price();
        // $target->update_promotion(1);

        // dd(
        //     $target->ar_name,
        //     // $target->has_promotion(),
        //     // $target->get_promotion()
        //     // $target->get_price(),
        //     $target->update_promotion(1)
        // );
    });
});
