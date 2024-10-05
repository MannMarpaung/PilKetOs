<aside id="sidebar" class="sidebar">

    @if (Auth::user()->role == 'admin')
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? '' : 'collapsed' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.user', 'admin.candidate.*', 'admin.election.*', 'admin.election_candidate.*') ? '' : 'collapsed' }}"
                    data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav"
                    class="nav-content collapse {{ request()->routeIs('admin.user', 'admin.candidate.*', 'admin.election.*', 'admin.election_candidate.*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.user') }}"
                            class="{{ request()->routeIs('admin.user') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.election.index') }}"
                            class="{{ request()->routeIs('admin.election.*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Election</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Tables Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('frontend.index') }}">
                    <i class="bi bi-person"></i>
                    <span>QiyEl Page</span>
                </a>
            </li>
        </ul>
    @else
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.dashboard') ? '' : 'collapsed' }}"
                    href="{{ route('user.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.candidate.*', 'user.election.*', 'user.election_candidate.*') ? '' : 'collapsed' }}"
                    data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav"
                    class="nav-content collapse {{ request()->routeIs('user.candidate.*', 'user.election.*', 'user.election_candidate.*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.election.index') }}"
                            class="{{ request()->routeIs('user.election.*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Election</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Tables Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('frontend.index') }}">
                    <i class="bi bi-person"></i>
                    <span>QiyEl Page</span>
                </a>
            </li>
        </ul>
    @endif



</aside>
