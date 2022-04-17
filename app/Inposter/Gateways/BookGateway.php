<?php


namespace App\Inposter\Gateways;

use App\Inposter\Interfaces\BookRepositoryInterface;
use http\Env\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;


class BookGateway
{
    use ValidatesRequests;

    public function __construct(BookRepositoryInterface $bR)
    {
        $this->bR = $bR;
    }

    public function store($request)
    {

        $data = $request->all();
        $validator = Validator::make($data, [
                'title' => 'required|min:2|max:255',
                'categories' =>  'required|array|min:1',
                'categories.*" => "required|integer',
                'author' => 'nullable|min:1|max:255',
                'description' => 'nullable|min:1|max:10000',
                'borrowed' => 'nullable|min:1|max:255',
                'read' => 'nullable|integer',
            ]
        );

        return $validator;
    }
}
