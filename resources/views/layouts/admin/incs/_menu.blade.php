@php 
$lang = LaravelLocalization::getCurrentLocale(); 
@endphp
<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is($lang.'/admin') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>@lang('_menu.Dashboard')</p>
    </a>
</li>

@if(auth()->user()->hasRole('admin'))
<li class="nav-item {{ str_contains(Request::path(), '/users') || str_contains(Request::path(), '/roles') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <!-- <i class="nav-icon fas fa-id-card"></i> -->
        <i class="nav-icon fas fa-headset"></i>
        <p>
            @lang('_menu.Users')
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is($lang . '/admin/users') ? 'active' : ''}}">
                <!-- <i class="nav-icon fas fa-clipboard-list"></i> -->
                <i class="nav-icon fas fa-headset"></i>
                <p>@lang('_menu.Users')</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Request::is($lang . '/admin/roles') ? 'active' : ''}}">
                <!-- <i class="nav-icon fas fa-copyright"></i> -->
                <i class="nav-icon fas fa-id-card"></i>
                <p>@lang('_menu.Roles')</p>
            </a>
        </li>
    </ul>
</li>
@elseif(auth()->user()->isAbleTo('users_*'))
<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is($lang . '/admin/users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-headset"></i>
        <p>@lang('_menu.Users')</p>
    </a>
</li>
@endif

@if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('customer*'))
<li class="nav-item">
    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Request::is($lang . '/admin/customers') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>@lang('_menu.Customers')</p>
    </a>
</li>
@endif

@if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_*') || auth()->user()->isAbleTo('products_*') || auth()->user()->isAbleTo('brands_*'))
<li class="nav-item {{ str_contains(Request::path(), '/products-categories') || str_contains(Request::path(), '/products') || str_contains(Request::path(), '/brands') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-box-open"></i>
        <p>
            @lang('_menu.Products')
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products-categories_*'))
        <li class="nav-item">
            <a href="{{ route('admin.products-categories.index') }}" class="nav-link {{ Request::is($lang . '/admin/products-categories') ? 'active' : ''}}">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>@lang('_menu.Categories')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('brands_*'))
        <li class="nav-item">
            <a href="{{ route('admin.brands.index') }}" class="nav-link {{ Request::is($lang . '/admin/brands') ? 'active' : ''}}">
                <i class="nav-icon fas fa-copyright"></i>
                <p>@lang('_menu.Brands')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products_*'))
        <li class="nav-item">
            <a href="{{ route('admin.products.index') }}" class="nav-link {{ Request::is($lang . '/admin/products') ? 'active' : ''}}">
                <i class="nav-icon fas fa-boxes"></i>
                <p>@lang('_menu.Products')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('products_*'))
        <li class="nav-item">
            <a href="{{ route('admin.products_names.index') }}" class="nav-link {{ Request::is($lang . '/admin/products-names') ? 'active' : ''}}">
                <i class="nav-icon fas fa-file-signature"></i>
                <p>@lang('_menu.Products_Names')</p>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

@if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('orders_*') || auth()->user()->isAbleTo('sold_products*'))
<li class="nav-item {{ str_contains(Request::path(), '/orders') || str_contains(Request::path(), '/sold-products') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            @lang('_menu.Sales')
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('orders_*'))
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is($lang . '/admin/orders') ? 'active' : '' }}">
                <i class="nav-icon fas fa-dolly"></i>
                <p>@lang('_menu.Orders')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sold_products_*'))
        <li class="nav-item">
            <a href="{{ route('admin.sold_products.index') }}" class="nav-link {{ Request::is($lang . '/admin/sold-products') ? 'active' : ''}}">
                <i class="nav-icon fas fa-box-open"></i>
                <p>@lang('_menu.Sold_Products')</p>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

@if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('promotions_*') || auth()->user()->isAbleTo('promo_*'))
<li class="nav-item {{ str_contains(Request::path(), 'promotions') || str_contains(Request::path(), 'promo-codes') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            @lang('_menu.Promotions')
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        @if(auth()->user()->hasRole('admin')  || auth()->user()->isAbleTo('promotions_*'))
        <li class="nav-item">
            <a href="{{ route('admin.promotions.index') }}" class="nav-link {{ Request::is($lang . '/admin/promotions') ? 'active' : ''}}">
                <i class="nav-icon fas fa-percentage"></i>
                <p>@lang('_menu.Discounts')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('promo_*'))
        <li class="nav-item">
            <a href="{{ route('admin.promo.index') }}" class="nav-link {{ Request::is($lang . '/admin/promo-codes') ? 'active' : ''}}">
                <i class="nav-icon fas fa-gift"></i>
                <p>@lang('_menu.Promo_Codes')</p>
            </a>
        </li>
        @endif
    </ul>
</li>
@endif

@if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('shipping_*') || auth()->user()->isAbleTo('fees_*') || auth()->user()->isAbleTo('taxes_*') || auth()->user()->isAbleTo('order_status_*') || auth()->user()->isAbleTo('districts_*') || auth()->user()->isAbleTo('sms_*'))
<li class="nav-item {{ str_contains(Request::path(), '/shipping') || str_contains(Request::path(), '/taxes') || str_contains(Request::path(), '/fees') || str_contains(Request::path(), '/order-status') || str_contains(Request::path(), '/districts') || str_contains(Request::path(), '/sms') || str_contains(Request::path(), '/banks') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-sliders-h"></i>
        <p>
            @lang('_menu.Settings')
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('shipping_*'))
        <li class="nav-item">
            <a href="{{ route('admin.shipping.index') }}" class="nav-link {{ Request::is($lang . '/admin/shipping') ? 'active' : '' }}">
                <i class="nav-icon fas fa-shipping-fast"></i>
                <p>@lang('_menu.Shipping')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('fees_*'))
        <li class="nav-item">
            <a href="{{ route('admin.fees.index') }}" class="nav-link {{ Request::is($lang . '/admin/fees') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tags"></i>
                <p>@lang('_menu.Fees')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('taxes_*'))
        <li class="nav-item">
            <a href="{{ route('admin.taxes.index') }}" class="nav-link {{ Request::is($lang . '/admin/taxes') ? 'active' : ''}}">
                <i class="nav-icon fas fa-percentage"></i>
                <p>@lang('_menu.Taxes')</p>
            </a>
        </li>
        @endif
        
        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('order_status_*'))
        <li class="nav-item">
            <a href="{{ route('admin.order_status.index') }}" class="nav-link {{ Request::is($lang . '/admin/order-status') ? 'active' : ''}}">
                <i class="nav-icon fas fa-flag"></i>
                <p>@lang('_menu.Orders_Status')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('districts_*'))
        <li class="nav-item">
            <a href="{{ route('admin.districts.index') }}" class="nav-link {{ Request::is($lang . '/admin/districts') ? 'active' : ''}}">
                <i class="nav-icon fas fa-map-marked-alt"></i>
                <p>@lang('_menu.Districts')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('sms_*'))
        <li class="nav-item">
            <a href="{{ route('admin.sms.index') }}" class="nav-link {{ Request::is($lang . '/admin/sms') ? 'active' : ''}}">
                <i class="nav-icon fas fa-sms"></i>
                <p>@lang('_menu.SMS')</p>
            </a>
        </li>
        @endif

        @if(auth()->user()->hasRole('admin') || auth()->user()->isAbleTo('banks_*'))
        <li class="nav-item">
            <a href="{{ route('admin.banks.index') }}" class="nav-link {{ Request::is($lang . '/admin/banks') ? 'active' : ''}}">
                <i class="nav-icon fas fa-money-check-alt"></i>
                <p>@lang('_menu.banks')</p>
            </a>
        </li>
        @endif


    </ul>
</li>
@endif

@if(auth()->user()->hasRole('admin'))
<li class="nav-item {{ str_contains(Request::path(), '#') || str_contains(Request::path(), '#') || str_contains(Request::path(), 'admin/theme/') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-puzzle-piece"></i>
        <p>
            @lang('_menu.Theme_Settings')
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        <li class="nav-item">
            <a href="{{ url('admin/theme/slider') }}" class="nav-link {{ Request::is($lang . '/admin/theme/slider') ? 'active' : ''}}">
                <i class="nav-icon fas fa-images"></i>
                <p>@lang('_menu.Slider')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/theme/navbar') }}" class="nav-link {{ Request::is($lang . '/admin/theme/navbar') ? 'active' : ''}}">
                <i class="nav-icon fas fa-stream"></i>
                <p>@lang('_menu.Navbar')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/theme/custome-section') }}" class="nav-link {{ Request::is($lang . '/admin/theme/custome-section') ? 'active' : ''}}">
                <i class="nav-icon fas fa-object-group"></i>
                <p>@lang('_menu.Custome_Sections')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/theme/contacts-info') }}" class="nav-link {{ Request::is($lang . '/admin/theme/contacts-info') ? 'active' : ''}}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>@lang('_menu.Contacts_Info')</p>
            </a>
        </li>
    </ul>
</li>
@endif