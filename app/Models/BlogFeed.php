<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogFeed extends Model
{
    use HasFactory;

    protected $table = "blog_feed";

    protected $fillable = [
        "blog_feed",
    ];
}
