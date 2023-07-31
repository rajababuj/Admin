@php
$current_route = request()->route()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin-assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- <li class="nav-item {{ $current_route == 'trainer.index' ? 'menu-open' : '' }}">
                    <a href="{{ route('trainer.index') }}" class="nav-link {{ $current_route == 'trainer.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Dashboard <i class="right fas fa-angle-left"></i></p>
                    </a>
                </li> -->
                <li class="nav-item {{ $current_route == 'admin.users.index' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $current_route == 'admin.users.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Customer <i class="right fas fa-angle-left"></i></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('membership.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Membership <i class="right fas fa-angle-left"></i></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('trainer.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Trainer <i class="right fas fa-angle-left"></i></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('training.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Training <i class="right fas fa-angle-left"></i></p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
