<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Inposter">
    <meta name="author" content="Mateusz Kałwiński">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>


    <link rel="icon" href="{{asset('img/logo.png')}} ">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('components/material/css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('components/material/css/mdb.min.css')}}">
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons" >
    <!-- Image uploader -->
    <link rel="stylesheet" href="{{asset('components/image-uploader/dist/image-uploader.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('components/material/css/style.css')}}">
    <!-- SLICK (optional) -->
{{--    <link rel="stylesheet" type="text/css" href="{{asset('components/slick-1.8.1/slick/slick.css')}}"/>--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('components/slick-1.8.1/slick/slick-theme.css')}}"/>--}}
<!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('components/material/css/addons/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('components/material/css/addons/datatables-select.min.css')}}"/>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="white-skin">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel  grey lighten-5">
        <div class="container">
            <a href="{{url('posts')}}" class="ml-4 mr-4 pr-2 pl-2 logo-menu-link text-dark text-decoration-none">
                <img src="{{ asset('img/logo.png') }}" class="logo-menu-image" alt="logo">
                Biblioteczka
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                    @else
                        <li class="nav-item mr-3">
                            <a class="nav-link btn btn-sm primary-color btn-rounded pl-3 pr-3 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0"
                               href="{{route('categories-create')}}">{{ __('Dodaj kategorię') }} <i class="fas fa-plus ml-2"></i></a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link btn btn-sm primary-color btn-rounded pl-3 pr-3 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0"
                               href="{{route('categories-create')}}">{{ __('Dodaj autora') }} <i class="fas fa-plus ml-2"></i></a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link btn btn-sm primary-color btn-rounded pl-3 pr-3 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0"
                               href="{{route('post-create')}}">{{ __('Dodaj post') }} <i class="fas fa-plus ml-2"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Wyloguj') }}
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

    <main>
        @yield('content')
    </main>
</div>

<script type="text/javascript" src="{{asset('components/material/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('components/material/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('components/material/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('components/material/js/mdb.min.js')}}"></script>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
