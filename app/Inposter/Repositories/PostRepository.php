<?php

namespace App\Inposter\Repositories;

use App\{Inposter\Interfaces\PostRepositoryInterface, Models\Post, Models\PostCategory};

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PostRepository implements PostRepositoryInterface
{
    public function getPosts()
    {
        $posts = Post::with([
            'postCategory',
            'postCategory.category'
        ])->paginate(5);

        return $posts;
    }

    public function getPost(int $id)
    {
        $post = Post::with([
            'postCategory',
            'postCategory.category'
        ])->find($id);

        return $post;
    }

    public function createPost($request)
    {
        DB::beginTransaction();

        try {
            $post = new Post();
            $post->content = $request->content;
            $post->created_at = Carbon::now('Europe/Warsaw');
            $post->updated_at = null;
            $post->save();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('posts/create')->with('status', 'Błąd podczas zapisu postu!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            foreach ($request->categories as $category) {
                PostCategory::create([
                    'post_id' => $post->id,
                    'category_id' => $category,
                    'created_at' => Carbon::now('Europe/Warsaw'),
                ]);
            }
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('posts/create')->with('status', 'Błąd podczas zapisu postu!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


        DB::commit();

        $posts = Post::with('postCategory')->get();
        Redis::set('posts', $posts);

        return redirect('posts/create')->with('status', 'Post dodany!');

    }

    public function updatePost($request)
    {
        DB::beginTransaction();

        $isExist = Post::where('id', '=', $request->id)->exists();

        if (!$isExist) {
            return redirect('posts/create')->with('status', 'Nie znaleziono takiego postu!');
        }

        try {
            Post::where('id', '=', $request->id)->update([
                'content' => $request->content,
                'updated_at' => Carbon::now('Europe/Warsaw'),
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('posts/create')->with('status', 'Błąd podczas edycji postu!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            DB::table('post_categories')->where('post_id', '=', $request->id)->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('posts/create')->with('status', 'Błąd podczas edycji postu!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            foreach ($request->categories as $category) {
                PostCategory::create([
                    'post_id' => $request->id,
                    'category_id' => $category,
                    'created_at' => Carbon::now('Europe/Warsaw'),
                ]);
            }
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect('posts/create')->with('status', 'Błąd podczas edycji postu!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        $posts = Post::with('postCategory')->get();
        Redis::set('posts', $posts);

        return redirect('posts/create')->with('status', 'Post zaktualizowany!');

    }
}
