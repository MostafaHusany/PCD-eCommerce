<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link" >
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Home</p>
    </a>

    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" >
        <i class="nav-icon fas fa-headset"></i>
        <p>Users</p>
    </a>

    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Request::is('admin/customers') ? 'active' : '' }}" >
        <i class="nav-icon fas fa-users"></i>
        <p>Customers</p>
    </a>
</li>

