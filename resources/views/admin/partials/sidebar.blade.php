<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('admin.dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Users
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.settings.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.contact.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Contact Messages
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>

                <li class="nav-item has-treeview">
                    <a href="{{route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.products.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Orders
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.florists.index')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
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
                    <a href="{{route('admin.shops.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Shops
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                        </p>
                    </a>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item mb-2">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
