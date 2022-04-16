<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Plantaris NET">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Image uploader -->
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('components/material/css/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>

        .navbar {
            background: linear-gradient(40deg, rgba(0, 51, 199, .3), rgba(209, 149, 249, .3));
        }

        .navbar:not(.top-nav-collapse) {
            background: transparent;
        }

        .navbar .navbar-brand img {
            height: 40px;
            margin: 10px;
        }

        .heading {
            margin: 0 6rem;
            font-size: 3.8rem;
            font-weight: 700;
            color: #5d4267;
        }

        .subheading {
            margin: 2.5rem 6rem;
            color: #bcb2c0;
        }
    </style>
</head>
<body>
<div id="app">
    <header>
        <!--Navbar -->
        <nav class="navbar navbar-expand-lg scrolling-navbar navbar-dark z-depth-0 fixed-top">
            <a class="navbar-brand text-black-50" href="{{route('posts')}}">
                <img src="{{asset('/img/logo.png')}}" alt="newspaper logo">
                Biblioteczka
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <a href="{{ url('/posts') }}" class="">Posty</a>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm primary-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <!--/.Navbar -->

        <!-- Intro -->
        <section class="container-fluid">

            <div class="row">

                <div class="col-md-6">

                    <div class="d-flex flex-column justify-content-center align-items-center vh-100">
                        <h1 class="heading text-success text-center">Mateusz Kałwiński</h1>
                        <h4 class="subheading font-weight-light text-black-50">Zadanie rekrutacyjne Web Solutions</h4>
                        @guest()
                        <a class="nav-link btn primary-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                        @else
                            <a class="nav-link btn primary-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0" href="{{ route('posts') }}">{{ __('Zobacz posty') }}</a>
                        @endguest
                    </div>

                </div>

                <div class="col-md-6"
                     style='background-image: url("{{asset('/img/bg.jpg')}}"); background-size: cover; background-repeat: no-repeat '>

                </div>

            </div>
        </section>
    </header>
</div>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('components/material/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('components/material/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('components/material/js/mdb.min.js')}}"></script>

</body>
</html>




