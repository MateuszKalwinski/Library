<?php


namespace App\Inposter\Gateways;

use App\Inposter\Interfaces\CategoryRepositoryInterface;
use http\Env\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;


class CategoryGateway
{
    use ValidatesRequests;

    public function __construct(CategoryRepositoryInterface $cR)
    {
        $this->cR = $cR;
    }

    public function store($request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
                'categoryName' => "required|min:2|max:255|unique:categories,name",
            ]
        );

        if ($validator->fails()) {
            return redirect('categories/create')->withErrors(['msg' => $validator->errors()->all()]);
        }

        return $this->cR->store($request);
    }
}
