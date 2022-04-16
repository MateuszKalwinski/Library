@extends('layouts.app')
@section('content')

    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-2">
                    <div class="d-flex">
                        <h2 class="color-mid-grey">{{$title}}</h2>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-primary">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <form method="POST" action="{{route('post-create')}}">
                    @csrf
                    <div class="col-lg-12 col-md-12">
                        <div class="mt-5">
                            <div class="mt-5">
                                <p class="blue-text">Kategoria i treść wpisu</p>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="md-form">
                                        <select class="mdb-select md-form"
                                                searchable="Szukaj..." id="categories" multiple searchable="Szukaj..."
                                                data-label-select-all="Wybierz wszystkie"
                                                data-label-options-selected="opcji wybranych"
                                                name="categories[]">
                                            <option value="" disabled selected>Nie
                                                wybrano
                                            </option>

                                            @foreach($categories as $category)
                                                @if(isset($post->postCategory))
                                                    @php
                                                        $find = 0;
                                                    @endphp
                                                    @foreach($post->postCategory as $postCategory)
                                                        @if($category->id == $postCategory->category_id)

                                                            @php
                                                                $find = 1;
                                                            @endphp
                                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @if($find == 0)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn-save btn btn-primary btn-sm">Zapisz</button>
                                        <label for="categories"
                                               class="mdb-main-label">{{ __('Kategorie *') }}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="md-form">
                                        <textarea id="content" name="content" class="md-textarea form-control" rows="2"
                                                  value="{{$post->content ?? ''}}"
                                                  maxlength="10000">{{$post->content ?? ''}}</textarea>
                                        <label for="content">{{ __('Treść *') }}</label>
                                    </div>
                                    <input type="hidden" name="id" value="{{$post->id ?? ''}}">

                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="nav-link btn btn-sm success-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0">
                            {{ __('Zapisz post') }} <i class="fas fa-check ml-3"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
