<?php

namespace App\Http\Controllers;

use App\Inposter\Gateways\PostGateway;
use App\Inposter\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $postRepository, PostGateway $postGateway)
    {
        $this->middleware('auth');
        $this->pR = $postRepository;
        $this->pG = $postGateway;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
    {
        if (is_null($id)) {
            $posts = $this->pR->getPosts();

            return view('posts.posts', ['posts' => $posts]);
        } else {
            $categories = (new \App\Inposter\Repositories\CategoryRepository)->getCategories();
            $post = $this->pR->getPost($id);

            return view('posts.create',
                ['title' => 'Edytuj post',
                    'categories' => $categories,
                    'post' => $post,

                ]
            );
        }
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {

            $categories = (new \App\Inposter\Repositories\CategoryRepository)->getCategories();

            return view('posts.create',
                ['title' => 'Dodaj post',
                    'categories' => $categories,
                    'post' => null,

                ]
            );

        } elseif ($request->isMethod('post')) {

            $savePost = $this->pG->savePost($request);
            return  $savePost;

        } else {

            return redirect('posts/create')->with('status', 'Ups! Coś poszło nie tak.');

        }
    }
}
