<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('vendor.dashboard')}}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{Route::currentRouteName() == 'vendor.products.index' ? 'active' : (Route::currentRouteName() == 'vendor.products.create' ? 'active' : (Route::currentRouteName() == 'vendor.products.show' ? 'active' : (Route::currentRouteName() == 'vendor.products.edit' ? 'active' : '')))}}">
            <a class="nav-link" href="{{route('vendor.products.index')}}">
                <i class="icon-bag menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
    </ul>
</nav>