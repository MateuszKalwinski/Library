<?php

namespace App\Inposter\Interfaces;


interface PostRepositoryInterface
{
    public function getPosts();

    public function getPost(int $id);

    public function createPost($request);

    public function updatePost($request);
}
