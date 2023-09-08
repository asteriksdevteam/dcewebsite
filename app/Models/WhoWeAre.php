<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoWeAre extends Model
{
    use HasFactory;

    protected $table = "about_us_who_we_are";

    protected $fillable = [
        'about_content',
        'image'
    ];
}
