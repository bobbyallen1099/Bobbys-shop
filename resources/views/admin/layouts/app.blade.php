<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bobby's Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="admin-panel">
        <aside id="menu" class="@if (session('menu_closed')) closed @endif">
            <nav>
                <div class="toggle-menu">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-fw fa-sign-in-alt"></i> <span>{{ __('Login') }}</span></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> <span>{{ __('Register') }}</span></a>
                            </li>
                        @endif
                    @else
                    
                    <li>
                        <a href="{{ route('admin') }}"><i class="fas fa-fw fa-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-fw fa-shopping-cart"></i> <span>Products</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.show', Auth::user())}}"><i class="fas fa-fw fa-user"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}"><i class="fas fa-fw fa-users"></i> <span>Users</span></a>
                    </li>
                    @endguest
                </ul>
            </nav>
            <div class="current-profile">
                <span>{{ Auth::user()->name }}</span>
                <i class="fas fa-sign-out-alt" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </aside>
        <main id="content">
            @yield('breadcrumb')
            @yield('content')
        </main>
      </div>
</body>
</html>
