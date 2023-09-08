<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsBanner extends Model
{
    use HasFactory;

    protected $table = "about_us_banner";

    protected $fillable = [
        'heading',
        'content'
    ];
}
