<?php

namespace App\Http\Controllers;

use App\Inposter\Gateways\CategoryGateway;
use App\Inposter\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryGateway $categoryGateway)
    {
        $this->middleware('auth');
        $this->cR = $categoryRepository;
        $this->cG = $categoryGateway;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function create()
    {
        $categories = Category::all();
        return view('categories.create',
            ['title' => 'Dodaj kategorie',
                'category' => [],
                'categories' => $categories,
            ]
        );
    }

    public function store(Request $request)
    {
        return $this->cG->store($request);
    }

    public function edit(Request $request, Category $category){
        $categories = Category::all();
        return view('categories.edit',
            ['title' => 'Edytuj kategorie',
                'category' => $category,
                'categories' => $categories,
            ]
        );
    }

    public function update(Request $request, Category $category){
        try {
            $category->update([
                'name' => $request->categoryName,
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('categories/edit')->with('status', 'Błąd podczas edycji kategorii!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect('categories/create')->with('status', 'Zaktualizowano kategorie!');    }

    public function destroy(Request $request, Category $category)
    {
        try {
            $category->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('categories/create')->with('status', 'Błąd podczas usuwania kategorii!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect('categories/create')->with('status', 'Usunięto kategorie!');

    }
}
