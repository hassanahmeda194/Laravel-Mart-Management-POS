<div class="app-menu navbar-menu">
    <div class="navbar-brand-box ">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <h4 class="fw-bold text-white my-5" style="letter-spacing: 5px">MSM</h4>
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <h4 class="fw-bold text-white my-4" style="line-height: 30px">Mart Managment</h4>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar" class="mt-4">
        <div class="container-fluid ">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Dashboard</span></li>
                <li class="nav-item mb-2">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                        <i class="ph-gauge"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-apps">Menu</span></li>
                <li class="nav-item mb-2">
                    <a href="{{ route('user.index') }}" class="nav-link menu-link">
                        <i class="ph-users"></i>
                        <span data-key="t-user">User</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('role.index') }}" class="nav-link menu-link">
                        <i class="ph-lock"></i>
                        <span data-key="t-role-permission">Role & Permission</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('branch.index') }}" class="nav-link menu-link">
                        <i class="ph-house"></i>
                        <span data-key="t-branches">Branches</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link menu-link collapsed" href="#sidebarDashboards" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ph-shopping-bag"></i> <span data-key="t-dashboards">Products</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('product.index')}}" class="nav-link" data-key="t-analytics">All
                                    Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('brand.index') }}" class="nav-link" data-key="t-crm">Brands</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('category.index') }}" class="nav-link"
                                    data-key="t-ecommerce">Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('unit.index') }}" class="nav-link" data-key="t-learning">Units</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('pos.index') }}" class="nav-link menu-link">
                        <i class="ph-money-thin"></i>
                        <span data-key="t-branches">POS</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
