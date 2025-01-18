<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="/assets/images/logo/logo-inventory.png" style="width: 60px; height: 60px" class="header-logo" />
                <span class="logo-name">Rental-Mobil App</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <!-- Main Navigation -->
            <li class="menu-header">Main Navigation</li>
            <li class="dropdown{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.cars.*') ? ' active' : '' }}">
                <a href="{{ route('admin.cars.index') }}" class="nav-link">
                    <i data-feather="truck"></i><span>Cars</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.rentals.*') ? ' active' : '' }}">
                <a href="{{ route('admin.rentals.index') }}" class="nav-link">
                    <i data-feather="file-text"></i><span>Rental</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.users.index') ? ' active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i data-feather="users"></i><span>Users</span>
                </a>
            </li>
            <li class="dropdown{{ request()->routeIs('admin.reports.index') ? ' active' : '' }}">
                <a href="{{ route('admin.reports.index') }}" class="nav-link">
                    <i data-feather="bar-chart-2"></i><span>Laporan</span>
                </a>
            </li>

            <!-- Logout Section -->
            <li class="dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i data-feather="log-out"></i><span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>
</div>
