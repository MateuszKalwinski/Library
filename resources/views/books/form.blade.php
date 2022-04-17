<div class="col-lg-12 col-md-12">
    <div class="mt-5">
        <div class="mt-2">
            <p class="blue-text mb-0">Dane książki</p>
        </div>
        <div class="form-row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="md-form">
                    <input type="text" id="title" name="title"
                           class="form-control"
                           value="{{$book->title ?? ''}}">
                    <label for="title"
                           class="label-fon">{{ __('Tytuł książki *') }}</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
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
                            @if(isset($book->bookCategory))
                                @php
                                    $find = 0;
                                @endphp
                                @foreach($book->bookCategory as $bookCategory)
                                    @if($category->id == $bookCategory->category_id)

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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="md-form">
                    <input type="text" id="author" name="author"
                           class="form-control"
                           value="{{$book->author ?? ''}}">
                    <label for="author"
                           class="label-fon">{{ __('Autor ') }}</label>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <p class="blue-text mb-0">Opis książki</p>
        </div>
        <div class="form-row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="md-form">
                                        <textarea id="description" name="description" class="md-textarea form-control" rows="2"
                                                  value="{{$book->description ?? ''}}"
                                                  maxlength="10000">{{$book->description ?? ''}}</textarea>
                    <label for="description">{{ __('Opis') }}</label>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <p class="blue-text mb-0">Pożyczył/a</p>
        </div>
        <div class="form-row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="md-form">
                    <input type="text" id="borrowed" name="borrowed"
                           class="form-control"
                           value="{{$book->borrowed ?? ''}}">
                    <label for="borrowed"
                           class="label-fon">{{ __('Pożyczył/a') }}</label>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <p class="blue-text mb-0">Przeczytano</p>
        </div>
        <div class="form-row mb-2">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="md-form">
                    <input type="checkbox" class="form-check-input"
                           name="read" id="read" value="1"  {{$book->read ?? '' === 1 ? 'checked' : ''}}  >
                    <label class="form-check-label"
                           for="read">Przeczytano</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit"
            class="nav-link btn btn-sm success-color btn-rounded pl-5 pr-5 text-white  waves-effect waves-light rgba-white-slight text-transform-none m-0">
        {{ __('Zapisz książkę') }} <i class="fas fa-check ml-3"></i>
    </button>
</div>
