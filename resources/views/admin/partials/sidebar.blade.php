<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin/dist/img/logo_tuana.jpg')}}" alt="AdminLTE Logo" class="brand-image  elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <a href="{{route('admin.users.index')}}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <span class="right badge badge-success">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.slider.index')}}" class="nav-link {{ request()->routeIs('admin.slider.index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Sliders
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.contact.index')}}" class="nav-link {{ request()->routeIs('admin.contact.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Contact Messages
                            <span class="badge badge-danger right">{{ $unreadMessagesCount }}</span>
                        </p>
                    </a>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.category.index')}}" class="nav-link {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.products.index')}}" class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link {{ request()->routeIs('admin.orders.index') ? 'active' : '' }}">
                        <i class="nav-icon fas  fa-shopping-cart"></i>
                        <p>
                            Orders
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.florists.index')}}" class="nav-link {{ request()->routeIs('admin.florists.index') ? 'active' : '' }}">
                        <i class="nav-icon far fa-user-circle"></i>
                        <p>
                            Florists
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.shops.index')}}" class="nav-link {{ request()->routeIs('admin.shops.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Shops
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.settings.index')}}" class="nav-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

                <li class="nav-header"></li>
                <li class="nav-item mb-2">
                    <a href="{{route('app.logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
