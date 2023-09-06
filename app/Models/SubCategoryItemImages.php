<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryItemImages extends Model
{
    use HasFactory;

    protected $table = "sub_categories_items_images";

    protected $fillable = [
        "sub_categories_items_id",
        "images",
    ];
    
}
