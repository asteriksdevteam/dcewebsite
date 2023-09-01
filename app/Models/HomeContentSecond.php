<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContentSecond extends Model
{
    use HasFactory;

    protected $table = "home_content_second";

    protected $fillable = [
        'content',
        'heading_one',
        'content_one',
        'image_one',
        'heading_second',
        'content_second',
        'image_second',
        'heading_third',
        'content_third',
        'image_third',
    ];
}
