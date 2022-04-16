@extends('layouts.app')

@section('content')

    <div class="login-container main-login">
        <form class="text-center login-form z-depth-5" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf

            <div class="d-flex justify-content-center">
                <img src="{{asset('img/logo.png')}}" class="logo-login-form" alt="logo">
            </div>

            <div class="md-form">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <label for="email">{{ __('E-Mail') }}</label>

            </div>

            <!-- Password -->
            <div class="md-form">
                <input id="password" type="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
                <label for="password">{{ __('Hasło') }}</label>

            </div>

            <div class="d-flex justify-content-around">
                <div>
                    <!-- Remember me -->
                    <div class="form-check pl-0">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Zapamiętaj mnie') }}
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-outline-primary btn-rounded btn-block mt-4 mb-3 mr-0 ml-0 waves-effect z-depth-0"
                    type="submit">
                {{ __('Zaloguj') }}
            </button>
        </form>
    </div>
@endsection
