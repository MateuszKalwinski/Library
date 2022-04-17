@extends('layouts.app')
@section('content')

    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-2">
                    <div class="d-flex">
                        <h2 class="color-mid-grey">Zmiana hasła</h2>
                    </div>
                    @include('helper.message')
                </div>
                <form class="mb-5" method="POST" action="{{route('update-password')}}">
                    @csrf
                    @method('PATCH')
                    <div class="col-lg-12 col-md-12">
                        <div class="mt-5">
                            <div class="mt-5">
                                <p class="blue-text mb-0">Stare hasło</p>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="md-form">
                                        <input type="password" id="password" name="password"
                                               class="form-control"
                                               value="">
                                        <label for="password"
                                               class="label-fon">{{ __('Obecne hasło *') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="md-form">
                                        <input type="password" id="newPassword" name="newPassword"
                                               class="form-control"
                                               value="">
                                        <label for="newPassword"
                                               class="label-fon">{{ __('Nowe hasło *') }}</label>
                                        <small class="text-secondary">Hasło musi składać się z 7-16 znaków. Postaja się użyć małych i wielkich liter, liczby oraz znaku zpecialnego</small>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="md-form">
                                        <input type="password" id="newPassword_confirmation" name="newPassword_confirmation"
                                               class="form-control"
                                               value="">
                                        <label for="newPassword_confirmation"
                                               class="label-fon">{{ __('Powtórz nowe hasło *') }}</label>
                                        <small class="text-secondary">Hasło musi składać się z 7-16 znaków. Postaja się użyć małych i wielkich liter, liczby oraz znaku zpecialnego</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="nav-link btn btn-sm success-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0">
                            {{ __('Zapisz kategorie') }} <i class="fas fa-check ml-3"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
