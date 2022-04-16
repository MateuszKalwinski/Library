@extends('layouts.app')
@section('content')

    <div>
        <div class="container mt-5">
            <div class="row">
                @if(count($posts) == 0)
                    <div class="col-lg-12 col-md-12 p-3">
                        <div class="card border-none mb-3">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Usp! Nie znaleźliśmy żadnych wpisów.</h4>
                                <div class="mb-4">
                                    <p class="card-text">Spróbuj ponownie później</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach($posts as $post)

                    <div class="col-lg-12 mb-3">
                        <div class="card">
                            <div class="card-body">

                                <ul class="list-group list-group-horizontal-sm">

                                    @foreach($post->postCategory as $category)
                                        <li class="list-group-item p-2">{{$category->category->name}}</li>
                                    @endforeach
                                </ul>

                                <div class="mt-3 ml-2">
                                <p>{{$post->content}}</p>
                                </div>
                                <div class="mt-3 d-flex justify-content-end">
                                    <div class="d-flex justify-content-end w-25">
                                        <a class="nav-link btn btn-sm amber darken-1 btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0"
                                           href="{{route('posts', ['id' => $post->id])}}">{{ __('edytuj post') }} <i class="fas fa-edit ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="col-lg-12">
                    {!! $posts->links() !!}
                </div>
            </div>


        </div>
    </div>

@endsection
