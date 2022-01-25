<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link" >
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" >
        <i class="nav-icon fas fa-headset"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}" >
        <i class="nav-icon fas fa-users"></i>
        <p>Customers</p>
    </a>
</li>

{{--
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Tables
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/tables/jsgrid.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>jsGrid</p>
            </a>
        </li>
    </ul>
</li>

--}}
<li class="nav-item {{ str_contains(Request::path(), '/products-categories') || str_contains(Request::path(), '/products') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
        <i class="nav-icon fas fa-box-open"></i>
        <p>
            Products
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        <li class="nav-item">
            <a href="{{ route('admin.products-categories.index') }}" class="nav-link {{ Request::is('admin/products-categories') ? 'active' : ''}}">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.products.index') }}" class="nav-link {{ Request::is('admin/products') ? 'active' : ''}}">
                <i class="nav-icon fas fa-boxes"></i>
                <p>Products</p>
            </a>
        </li>
    </ul>
</li>


{{--
<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}" >
        <i class="nav-icon fas fa-dolly"></i>
        <p>Orders</p>
    </a>
</li>
--}}


<li class="nav-item {{ str_contains(Request::path(), '/orders') || str_contains(Request::path(), '/sold-products') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            Sales
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-dolly"></i>
                <p>Orders</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.sold_products.index') }}" class="nav-link {{ Request::is('admin/sold-products') ? 'active' : ''}}">
                <i class="nav-icon fas fa-box-open"></i>
                <p>Sold Products</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item {{ str_contains(Request::path(), '/shipping') || str_contains(Request::path(), '/taxes') || str_contains(Request::path(), '/fees') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
        <i class="nav-icon fas fa-sliders-h"></i>
        <p>
            Settings
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        <li class="nav-item">
            <a href="{{ route('admin.shipping.index') }}" class="nav-link {{ Request::is('admin/shipping') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-shipping-fast"></i>
                <p>Shipping</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.fees.index') }}" class="nav-link {{ Request::is('admin/fees') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tags"></i>
                <p>Fees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.taxes.index') }}" class="nav-link {{ Request::is('admin/taxes') ? 'active' : ''}}">
                <i class="nav-icon fas fa-percentage"></i>
                <p>Taxes</p>
            </a>
        </li>
    </ul>
</li>