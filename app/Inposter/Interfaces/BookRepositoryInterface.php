<?php

namespace App\Inposter\Interfaces;


interface BookRepositoryInterface
{
    public function getBooks();

    public function getBooksForDatatable();
}
