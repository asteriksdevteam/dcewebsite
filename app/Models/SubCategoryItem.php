<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryItem extends Model
{
    use HasFactory;

    protected $table = "sub_categories_items";

    protected $fillable = [
        "sub_category_id",
        "item_name",
    ];
}
