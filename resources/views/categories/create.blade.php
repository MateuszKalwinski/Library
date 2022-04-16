@extends('layouts.app')
@section('content')

    <div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-2">
                    <div class="d-flex">
                        <h2 class="color-mid-grey">{{$title}}</h2>
                    </div>
                    @include('helper.message')
                </div>
                <form class="mb-5" method="POST" action="{{route('categories-store')}}">
                    @csrf
                    @method('POST')
                    @include('categories.form', $category)
                </form>
                @include('categories.table', $categories)
            </div>
        </div>
    </div>

@endsection
