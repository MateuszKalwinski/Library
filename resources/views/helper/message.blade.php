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
