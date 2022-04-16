<?php

namespace App\Inposter\Repositories;

use App\{Inposter\Interfaces\CategoryRepositoryInterface, Models\Category};

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getCategories()
    {
        $categories = Category::categories()->whereNull('deleted_at')->orderBy('name', 'ASC')->get();

        return $categories;
    }

    public function store($request)
    {

        try {
            Category::create([
                'name' => $request->categoryName,
                'created_at' => Carbon::now('Europe/Warsaw'),
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('categories/create')->with('status', 'Błąd podczas zapisu kategorii!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect('categories/create')->with('status', 'Zapisano kategorie!');

    }
}
