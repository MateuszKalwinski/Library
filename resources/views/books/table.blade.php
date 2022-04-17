<div class="col-lg-12 col-md-12 mb-2">
    <h4 class="color-mid-grey">Lista kategorii</h4>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col" style="width: 5%;">#</th>
            <th scope="col" style="width: 70%;">Nazwa</th>
            <th scope="col" style="width: 15%;">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $key => $category)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <div class="d-flex">
                        <div class="mr-2">
                            <form method="POST" action="{{route('categories-destroy', $category->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="nav-link btn btn-sm btn-danger btn-rounded pl-2 pr-2 text-white waves-effect waves-light rgba-white-slight text-transform-none m-0">
                                    Usuń<i class="fas fa-trash ml-1"></i>
                                </button>
                            </form>
                        </div>
                            <a href="{{route('categories-edit', $category->id)}}" class="nav-link btn btn-sm orange btn-rounded pl-2 pr-2 text-white waves-effect waves-light rgba-white-slight text-transform-none m-0">
                                Edytuj<i class="fas fa-edit ml-1"></i>
                            </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Brak</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
