<aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href= "/">
            <img src="{{ asset('../assets/img/nusa-removebg-preview.png') }}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold">Nusa Inventory</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user*') ? 'active' : '' }}" href="/user">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Data</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ Request::is('category*') ? 'active' : '' }}" href="/category">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-folder-17 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category Data</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('product*') ? 'active' : '' }}" href="/product">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product Data</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('supplier*') ? 'active' : '' }}" href="/supplier">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-user-run text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Supplier Data</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('purchase*') ? 'active' : '' }}" href="/purchase">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-delivery-fast text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Purchase Data</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('sale*') ? 'active' : '' }}" href="/sale">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sale Data</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{Request::is('profile*') ? 'active' : ''}}" href="/profile">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-badge text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a> --}}
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('actionlogout') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bold-left text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Log Out</span>
                </a>
            </li>

        </ul>
    </div>

</aside>
