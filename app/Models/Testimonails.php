<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonails extends Model
{
    use HasFactory;

    protected $table = "testimonials";
    
    protected $fillable = [
        'name',
        'designation',
        'comment',
        'image',
    ];
}
