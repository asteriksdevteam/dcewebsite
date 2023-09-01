<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContentThird extends Model
{
    use HasFactory;
    protected $table = "home_content_third";

    protected $fillable = [
        'heading1',
        'content1',
        'image1',
        'heading2',
        'content2',
        'image2',
        'heading3',
        'content3',
        'image3',
        'heading4',
        'content4',
        'image4',

    ];
}
