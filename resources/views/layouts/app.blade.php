<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    {{-- cdn di fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-nav shadow-sm ">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="http://localhost:5173">
                    <div>
                       <img width="100" src="/deliveboo-logo.png" alt="deliveboo-logo">
                    </div>
                </a>

                <button class="navbar-toggler px-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <img width="50" src="/hamburger_menu.png" alt="burger-menu">
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav align-items-center ms-md-auto gap-4 py-3 py-md-0">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="link-orange" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="link-orange" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="d-flex flex-column gap-4 flex-md-row">
                            <div class="text-center">
                                <span class="text-white text-center text-nowrap">
                                    {{ Auth::user()->name}}
                                </span>

                            </div>
                            <a class="dropdown-item link-orange text-center" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item link-orange text-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Disconnetti') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>

