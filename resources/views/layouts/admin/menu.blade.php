<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-headset"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Customers</p>
    </a>
</li>

<li class="nav-item {{ str_contains(Request::path(), 'promotions') || str_contains(Request::path(), '#') || str_contains(Request::path(), '#') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-percentage"></i>
        <p>
            Discounts
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" !style="display: block;">
        <li class="nav-item">
            <a href="{{ route('admin.promotions.index') }}" class="nav-link {{ Request::is('admin/promotions') ? 'active' : ''}}">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>Promotions</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('#') ? 'active' : ''}}">
                <i class="nav-icon fas fa-gift"></i>
                <p>Promo Codes</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ str_contains(Request::path(), '/products-categories') || str_contains(Request::path(), '/products') || str_contains(Request::path(), '/brands') ? 'menu-is-opening menu-open' : '' }}">
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
            <a href="{{ route('admin.brands.index') }}" class="nav-link {{ Request::is('admin/brands') ? 'active' : ''}}">
                <!-- <i class="fas fa-clipboard-list"></i> -->
                <i class="nav-icon fas fa-copyright"></i>
                <p>Brands</p>
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
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}">
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
            <a href="{{ route('admin.shipping.index') }}" class="nav-link {{ Request::is('admin/shipping') ? 'active' : '' }}">
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