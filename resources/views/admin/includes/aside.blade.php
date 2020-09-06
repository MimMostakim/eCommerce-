<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('/admin')}}/dist/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(Auth::user()->photo)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                @if(Auth::user()->role == 1)
                <li class="nav-item has-treeview">
                    <a href="{{url('user')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('admin-category')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('brand')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Brand
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('product')}}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('manage-order')}}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <span class="badge badge-info right">{{$order_count->count()}}</span>
                        <p>
                            Manage Order
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>