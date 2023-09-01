<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContentOne extends Model
{
    use HasFactory;

    protected $table = "home_content_one";

    protected $fillable = [
        'content',
        'image'
    ];
}
