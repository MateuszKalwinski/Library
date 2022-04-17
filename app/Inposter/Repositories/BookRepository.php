<?php

namespace App\Inposter\Repositories;

use App\{Inposter\Interfaces\BookRepositoryInterface, Models\Book};

class BookRepository implements BookRepositoryInterface
{
    public function getBooks()
    {
        $datatable = datatables()->of($this->getBooksForDatatable())
            ->addColumn('title', function ($data) {
                $bookLink = (isset($data->id) && !empty($data->id)) ? route('books-edit', $data->id) : '';
                $bookTitle = (isset($bookLink) && !empty($bookLink)) ? '<a href="' . $bookLink . '">' . $data->title . '</a>' : '<span>Brak</span>';
                return $bookTitle;
            })
            ->addColumn('author', function ($data) {
                return $data->author ?? 'Brak';
            })
            ->addColumn('categories', function ($data) {
                $categories = '';
                foreach ($data->bookCategory as $bookCategory){
                    $categories .= $bookCategory->category->name . ', ';
                }
                return substr($categories, 0, -2);

            })
            ->addColumn('description', function ($data) {
                return $data->description ?? 'Brak';
            })
            ->addColumn('read', function ($data) {
                return $data->read ? 'Tak' : 'Nie';
            })
            ->addColumn('borrowed', function ($data) {
                return  $data->borrowed ?? 'Nie';
            })
            ->addColumn('actions', function ($data) {
                return '<div class="d-flex">
                        <div class="mr-2">
                            <form method="POST" action="'.route('books-destroy', $data->id).'">
                            <input type="hidden" name="_token" value="'. csrf_token() .'">
                            '.method_field('DELETE').'
                                <button type="submit" class="nav-link btn btn-sm btn-danger btn-rounded pl-2 pr-2 text-white waves-effect waves-light rgba-white-slight text-transform-none m-0">
                                    Usuń<i class="fas fa-trash ml-1"></i>
                                </button>
                            </form>
                        </div>
                            <a href="'. route('books-edit', $data->id) .'" class="nav-link btn btn-sm orange btn-rounded pl-2 pr-2 text-white waves-effect waves-light rgba-white-slight text-transform-none m-0">
                                Edytuj<i class="fas fa-edit ml-1"></i>
                            </a>
                    </div>';

            })
            ->rawColumns(['title', 'author', 'description', 'categories', 'read', 'borrowed', 'actions'])
            ->make(true);

        return $datatable;
    }

    public function getBooksForDatatable()
    {
        $countryForDatatable = Book::with('bookCategory.category')->whereNull('deleted_at')->get();

        return $countryForDatatable;
    }
}
