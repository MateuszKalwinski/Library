<?php

namespace App\Http\Controllers;

use App\Inposter\Gateways\BookGateway;
use App\Inposter\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookRepositoryInterface $bookRepository, BookGateway $bookGateway)
    {
        $this->middleware('auth');
        $this->bR = $bookRepository;
        $this->bG = $bookGateway;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('books.list', ['title' => 'Moje książki',]
        );
    }

    public function list(){
        $datatable = $this->bR->getBooks();

        return $datatable;
    }

    public function create()
    {
        $categories = (new \App\Inposter\Repositories\CategoryRepository())->getCategories();

        return view('books.create',
            ['title' => 'Dodaj książkę',
                'categories' => $categories,
                'book' => [],
            ]
        );
    }

    public function store(Request $request)
    {
        $validator = $this->bG->store($request);

        if ($validator->fails()) {
            return redirect('books/create')->withErrors(['msg' => $validator->errors()->all()]);
        }

        DB::beginTransaction();

        try {
            $book = new Book();
            $book->title = $request->title;
            $book->author = $request->author;
            $book->description = $request->descripion;
            $book->borrowed = $request->borrowed;
            $book->read = $request->read ?? null;
            $book->user_id = auth()->id();
            $book->created_at = now();
            $book->updated_at = null;
            $book->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('books/create')->with('status', 'Błąd podczas zapisu książki!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            foreach ($request->categories as $category) {
                BookCategory::create([
                    'book_id' => $book->id,
                    'category_id' => $category,
                    'created_at' => now(),
                ]);
            }
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('books/create')->with('status', 'Błąd podczas zapisu książki!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


        DB::commit();

        return redirect('books')->with('status', 'Książka została dodana!');
    }

    public function edit(Request $request, Book $book){
        $categories = (new \App\Inposter\Repositories\CategoryRepository())->getCategories();
        return view('books.edit',
            ['title' => 'Edytuj kategorie',
                'book' => $book,
                'categories' => $categories,
            ]
        );
    }

    public function update(Request $request, Book $book){

        $validator = $this->bG->store($request);

        if ($validator->fails()) {
            return redirect('books/edit/'.$book->id)->withErrors(['msg' => $validator->errors()->all()]);
        }

        DB::beginTransaction();

        try {
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'borrowed' => $request->borrowed,
                'read' => $request->read ?? null,
                'updated_at' => now(),
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('books/edit')->with('status', 'Błąd podczas edycji książki!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            BookCategory::where('book_id', $book->id)->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('books/edit')->with('status', 'Błąd podczas edycji książki!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            foreach ($request->categories as $category) {
                BookCategory::create([
                    'book_id' => $book->id,
                    'category_id' => $category,
                    'created_at' => now(),
                ]);
            }
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('books/edit')->with('status', 'Błąd podczas zapisu książki!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


        DB::commit();

        return redirect('books')->with('status', 'Książka została zaktualizowsana!');
    }

    public function destroy(Request $request, Book $book)
    {
        try {
            $book->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('books')->with('status', 'Błąd podczas usuwania książki!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect('books')->with('status', 'Usunięto książkę!');
    }
}
