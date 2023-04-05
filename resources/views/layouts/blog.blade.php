<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DOWNLOAD 480p MKV - {{ config('app.name', 'Max Visuals') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/max.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/max.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">


    {{--    change the favicon--}}
    <link rel="icon" type="image/svg" href="/image/logo1.svg">
</head>
<body>
<div id="app">
    <nav style="background-color: var(--lightblue);" class="navbar navbar-expand-md navbar-dark  shadow-sm py-3 sticky-top">
        <div class="container-fluid">
            <div  class="pt-2 pb-2 nav-image" >
                <img src="/image/logo.svg" style="width: 100%;width: 100%;">
            </div>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto ">

                    <li class="nav-item">
                        <a class="nav-link" href="/">TODAY</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/">TV SERIES</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">TRAILERS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">SERIES CALENDAR</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">DMCA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">ADS PARTNERSHIP</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/posts">BLOG</a>
                    </li>

                    @if(!Auth::guest())
                        @if(Auth::user()->name == 'admin')
                            <!-- Dropdown -->
                            <li class="nav-item dropdown" style="">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Upload New
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/series">new series</a>
                                    <a class="dropdown-item" href="/seasons">new season</a>
                                    <a class="dropdown-item" href="/episodes">new episode</a>
                                </div>
                            </li>
                        @endif
                    @endif


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->


                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-5">
        <main class="">
            @include('inc.messages')
            @yield('content')
            @extends('layouts.footer')
        </main>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


</body>
</html>
