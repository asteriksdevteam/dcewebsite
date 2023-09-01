<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class SubCategory extends Model
{
    use HasFactory;

    protected $table = "sub_categories";

    protected $fillable = [
        "category_id",
        "sub_category_name",
    ];
    public function SubCategoryItem(): HasMany
    {
        return $this->hasMany(SubCategoryItem::class, 'sub_category_id', 'id');
    }
}
