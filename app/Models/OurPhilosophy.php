<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurPhilosophy extends Model
{
    use HasFactory;
    protected $table = "about_us_our_philosophy";

    protected $fillable = [
        "first_heading",
        "first_content",
        "second_heading",
        "second_content",
        "third_heading",
        "third_content",
        "fourth_heading",
        "fourth_content",
        "fifth_heading",
        "fifth_content",
        "sixth_heading",
        "sixth_content",
        'image',
    ];
}
