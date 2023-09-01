<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTechnologies extends Model
{
    use HasFactory;

    protected $table = "home_technologies";

    protected $fillable = [
        'heading_technologies',
        'content_technologies',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
    ];
}
