<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info text-center">
            <a href="{{ route('profile.show') }}" class="d-block text-center">
                {{ Auth::user()->name }} {{ ' - ' . Auth::user()->school_id ?? '' }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item  {{ request()->routeIs('home') ? 'nav-item-active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            @if (auth()->user()->role == 'admin')
                <li class="nav-item {{ request()->routeIs('users.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Users') }}
                        </p>
                    </a>
                </li>
            @endif

            {{-- <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li> --}}
            <li class="nav-header">Book Management</li>
            <li class="nav-item {{ request()->routeIs('books.*') ? 'nav-item-active' : '' }}">
                <a href="{{ route('books.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-book" aria-hidden="true"></i>
                    <p>
                        {{ __('Books') }}
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Books
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
