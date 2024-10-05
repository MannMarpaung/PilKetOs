<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('frontend.index') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="">
            <h1 class="sitename">iyEl</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('frontend.index') }}" class="{{ request()->routeIs('frontend.index') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('frontend.allElections') }}" class="{{ request()->routeIs('frontend.allElections') ? 'active' : '' }}">Elections</a></li>
                @if (Auth::check())
                    @if (Auth::user()->role === 'admin')
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li>
                                <button class="btn-getstarted border-0" type="submit">Logout</button>
                            </li>
                        </form>
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="border-0" type="submit">Dashboard</a>
                        </li>
                    @elseif (Auth::user()->role === 'user')
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li>
                                <button class="btn-getstarted border-0" type="submit">Logout</button>
                            </li>
                        </form>
                        <li>
                            <a href="{{ route('user.dashboard') }}">{{ Auth::user()->name }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <form action="{{ route('login') }}">
                            <button class="btn-getstarted border-0">Login</button>
                        </form>
                    </li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

        </nav>

    </div>
</header>
