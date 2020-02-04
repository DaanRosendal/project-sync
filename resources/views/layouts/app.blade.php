<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href=“{{asset('favicon.png')}}” rel=“icon” type=“image/x-icon”/>

    <link rel="icon" href="{{ URL::asset('/favicon.png') }}" type="image/x-icon"/>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/733442d4e1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            @if(Auth::user()->is_admin == false)
                                <a class="nav-link {{ Request::path() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                <a class="nav-link {{ Request::path() === 'declareren' ? 'active' : '' }}" href="{{ route('declareren') }}">Declareren</a>
                                <a class="nav-link {{ Request::path() === 'rapporten' ? 'active' : '' }}" href="{{ route('rapporten') }}">Rapporten</a>
                            @elseif(Auth::user()->is_admin == true)
                                <a class="nav-link {{ Request::path() === 'admin/home' ? 'active' : '' }}" href="{{ route('admin.home') }}">Home</a>
                                <a class="nav-link {{ strpos(Request::path(), 'projecten') !== false ? 'active' : '' }}" href="{{ route('admin.projecten.index') }}">Projecten</a>
                                <a class="nav-link {{ strpos(Request::path(), 'kosten') !== false ? 'active' : '' }}" href="{{ route('admin.kosten.index') }}">Kosten</a>
                                <a class="nav-link {{ strpos(Request::path(), 'consultants') !== false ? 'active' : '' }}" href="{{ route('admin.consultants.index') }}">Consultants</a>
                                <li class="nav-item dropdown {{ (Request::path() === 'admin/rapporten/consultants'||Request::path() === 'admin/rapporten/projecten') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                        Rapporten
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item {{ Request::path() === 'admin/rapporten/consultants' ? 'active' : '' }}" href="{{ route('admin.rapporten.consultants') }}">Kosten per consultant</a>
                                        <a class="dropdown-item {{ Request::path() === 'admin/rapporten/projecten' ? 'active' : '' }}" href="{{ route('admin.rapporten.projecten') }}">Kosten per project</a>
                                    </div>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'login' ? 'active' : ''}}" href="{{ route('login') }}">Inloggen</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::path() === 'register' ? 'active' : ''}}" href="{{ route('register') }}">Registreren</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} -
                                    @if(Auth::user()->is_admin == true) Admin
                                    @elseif(Auth::user()->is_admin == false) Consultant @endif <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Uitloggen
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
