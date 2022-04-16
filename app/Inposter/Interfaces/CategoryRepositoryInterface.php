<?php

namespace App\Inposter\Interfaces;


interface CategoryRepositoryInterface
{
    public function getCategories();

    public function store($request);
}
