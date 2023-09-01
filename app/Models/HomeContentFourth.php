<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContentFourth extends Model
{
    use HasFactory;

    protected $table = "home_content_fourth";

    protected $fillable = [
        'heading',
        'content',
        'image1',
        'heading1',
        'image2',
        'heading2',
        'image3',
        'heading3',
        'image4',
        'heading4',
        'image5',
        'heading5',
        'image6',
        'heading6',
        'image7',
        'heading7',
        'image8',
        'heading8',
    ];
}
