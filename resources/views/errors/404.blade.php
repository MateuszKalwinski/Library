@extends('layouts.app')

@section('content')

    <div class="login-container h-100 grey lighten-3">

        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center">

                <h1 class="display-1 red-text">404</h1>
                <h2 class="display-4 text-dark mb-5">Nie znaleniono takiej strony</h2>

                @guest()
                    <a class="nav-link btn primary-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                @else
                    <a class="nav-link btn primary-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0" href="{{ route('posts') }}">{{ __('Zobacz posty') }}</a>
                @endguest
            </div>
        </div>

    </div>
@endsection
