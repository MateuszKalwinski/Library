<?php

namespace App\Models;

use App\Inposter\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $table = 'posts';
    public $timestamps = true;
    protected $fillable = [
        'content',
    ];

    public function postCategory()
    {
        return $this->hasMany(PostCategory::class, 'post_id');
    }


}
