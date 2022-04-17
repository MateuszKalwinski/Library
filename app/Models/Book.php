<?php

namespace App\Models;

use App\Inposter\Repositories\BookRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $table = 'books';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
        'author',
        'read',
        'borrowed',
        'user_id',
    ];

    public function bookCategory()
    {
        return $this->hasMany(BookCategory::class, 'book_id');
    }


}
