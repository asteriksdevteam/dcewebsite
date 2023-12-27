<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        'meta_title',
        'meta_keyword',
        'meta_description',
        'slug',
        'blog_name',
        'category',
        'blog_image',
        'blog_image_thumb',
        'blog_short_description',
        'blog_description',
        'status',
        'date',
    ];

    public function Category(): HasOne
    {
        return $this->HasOne(Category::class,'id','category');
    }
}
