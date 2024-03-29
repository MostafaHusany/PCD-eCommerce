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

Route::redirect('/', 'admin/')->name('home');
Route::redirect('/home', 'admin/')->name('home');

Route::group(['middleware' => ['auth:web', 'admin.permissions', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], 
                'namespace' => 'Admin', 
                'prefix' => LaravelLocalization::setLocale() . '/admin'
            ], function () {
    
    Route::get('error', 'ErrorsController@has_no_permission')->name('admin.error.no_permission');

    Route::get('my-profile', 'UsersController@myProfile')->name('admin.profile.index');
    Route::post('my-profile', 'UsersController@updateProfile')->name('admin.profile.update');

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

    Route::resource('products-names', 'ProductsNamesController', ['names' => [
        'index'     => 'admin.products_names.index',
        'store'     => 'admin.products_names.store',
        'show'      => 'admin.products_names.show',
        'edit'      => 'admin.products_names.edit',
        'update'    => 'admin.products_names.update',
        'destroy'   => 'admin.products_names.destroy'
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

    Route::resource('districts', 'DistrictsController', ['names' => [
        'index'     => 'admin.districts.index',
        'store'     => 'admin.districts.store',
        'show'      => 'admin.districts.show',
        'edit'      => 'admin.districts.edit',
        'update'    => 'admin.districts.update',
        'destroy'   => 'admin.districts.destroy'
        ]
    ]);

    Route::resource('sms', 'SMSController', ['names' => [
        'index'     => 'admin.sms.index',
        'store'     => 'admin.sms.store',
        'show'      => 'admin.sms.show',
        'edit'      => 'admin.sms.edit',
        'update'    => 'admin.sms.update',
        'destroy'   => 'admin.sms.destroy'
        ]
    ]);
    
    Route::resource('banks', 'BankAccountsController', ['names' => [
        'index'     => 'admin.banks.index',
        'store'     => 'admin.banks.store',
        'show'      => 'admin.banks.show',
        'edit'      => 'admin.banks.edit',
        'update'    => 'admin.banks.update',
        'destroy'   => 'admin.banks.destroy'
        ]
    ]);

    Route::resource('invoices', 'InvoicesController', ['names' => [
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
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    });

    // theme editor
    Route::group(['prefix' => 'theme'], function () {
        Route::get('custome-section', 'ThemeController@customeSection')->name('admin.theme.custome');

        Route::get('navbar', 'ThemeController@navbar')->name('admin.theme.navbar.index');
        Route::post('navbar', 'ThemeController@store')->name('admin.theme.navbar.store');
        
        Route::get('slider', 'ThemeController@slider')->name('admin.theme.slider.index');
        Route::post('slider', 'ThemeController@store')->name('admin.theme.slider.store');
        
        Route::get('footer', 'ThemeController@footer')->name('admin.theme.footer.index');

        Route::get('contacts-info', 'ThemeController@contactsInfo')->name('admin.theme.contacts.index');
        Route::post('contacts-info', 'ThemeController@store')->name('admin.theme.contacts.store');

        Route::post('/', 'ThemeController@store')->name('admin.theme.post');
        Route::put('/{id}', 'ThemeController@update')->name('admin.theme.put');
        Route::delete('/{id}', 'ThemeController@destory')->name('admin.theme.delete');
    });

    // fast ajax search
    Route::get('/users-search', 'UsersController@dataAjax');
    Route::get('/roles-search', 'RolesController@dataAjax');
    Route::get('/permissions-search', 'PermissionsController@dataAjax');
    Route::get('/customers-search', 'CustomerController@dataAjax');
    Route::get('/products-search', 'ProductsController@dataAjax');
    Route::get('/products-categories-search', 'ProductCategoriesController@dataAjax');
    Route::get('/fees-search', 'FeesController@dataAjax');
    Route::get('/shipping-search', 'ShippingController@dataAjax');
    Route::get('/brand-search', 'BrandController@dataAjax');
    Route::get('/districts-search', 'DistrictsController@dataAjax');
    Route::get('/products-names-search', 'ProductsNamesController@dataAjax');

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


// Route::get('test', function () {
//     $api_url = 'http://www.4jawaly.net/api/sendsms.php?';
//     $user = 'username=pcdoctor';
//     $pass = 'password=pbdc741963';

//     $message = urlencode('Welcone PCD CEO to dwingsa store');
//     $phone_number = '966559206469';

//     $message      = "message=$message";
//     $phone_number = "numbers=$phone_number";
//     $encode       = "sender=PCD%20SUPPORT&unicode=e&Rmduplicated=1&return=json";

//     $url_sms  = $api_url . $user . '&' . $pass . '&' . $message . '&' . $phone_number . '&' . $encode;
//     // dd($url_sms);
//     // $response_hmsms = file_get_contents($url_sms);
//     // dd($response_hmsms);
//     $response = Http::get($url_sms);
//     $response = (array) json_decode($response->body());
//     dd($response);
//     // dd(json_decode($response_hmsms));
// });