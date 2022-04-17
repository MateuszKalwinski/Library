<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';
    public $timestamps = true;
    protected $fillable = [
        'name',
    ];

    public function BookCategory()
    {
        return $this->hasMany('App\BookCategory', 'category_id');
    }

    public function scopeCategories($query)
    {
        $query->select('id', 'name');
    }
}
