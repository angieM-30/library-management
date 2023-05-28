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

            @if (auth()->user()->role == 'admin')
                <li class="nav-header">Book Management</li>
            @endif
            <li class="nav-item {{ request()->routeIs('books.*') ? 'nav-item-active' : '' }}">
                <a href="{{ route('books.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-book" aria-hidden="true"></i>
                    <p>
                        {{ __('Books') }}
                    </p>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li class="nav-item {{ request()->routeIs('borrowers.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('borrowers.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            {{ __('Borrowers') }}
                        </p>
                    </a>
                </li>
            @endif

            <li class="nav-header">The developers</li>
            <li class="nav-item {{ request()->routeIs('about') ? 'nav-item-active' : '' }}">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
