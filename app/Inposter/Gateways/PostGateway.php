<?php


namespace App\Inposter\Gateways;

use App\Inposter\Interfaces\PostRepositoryInterface;
use http\Env\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;


class PostGateway
{
    use ValidatesRequests;

    public function __construct(PostRepositoryInterface $pR)
    {
        $this->pR = $pR;
    }

    public function savePost($request)
    {
        $data = $request->all();

        if (!isset($data->categories)){
            return redirect('posts/create')->withErrors(['msg' => 'Wybierz przynajmniej jedną kategorię']);
        }

        $validator = Validator::make($data, [
                'id' => 'nullable|integer',
                'content' => "required|min:2|max:10000",
                'categories => "required|array|min:1',
                'categories.*" => "required|integer',
            ]
        );

        if ($validator->fails()) {
            return redirect('posts/create')->withErrors(['msg' => $validator->errors()->all()]);
        }

        if (isset($data['id']) && !empty($data['id'])) {
            return $this->pR->updatePost($request);
        } else {
            return $this->pR->createPost($request);
        }
    }
}
