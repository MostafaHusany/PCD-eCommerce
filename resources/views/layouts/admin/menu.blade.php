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
        <!-- <li class="nav-item">
            <a href="../../index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../../index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
            </a>
        </li> -->
    </ul>
</li>


<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}" >
        <i class="nav-icon fas fa-dolly"></i>
        <p>Orders</p>
    </a>
</li>