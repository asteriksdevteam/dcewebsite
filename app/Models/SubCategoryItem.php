<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubCategoryItem extends Model
{
    use HasFactory;

    protected $table = "sub_categories_items";

    protected $fillable = [
        "sub_category_id",
        "item_name",
    ];

    public function SubCategory(): HasOne
    {
        return $this->HasOne(SubCategory::class, 'id', 'sub_category_id');
    }
    public function SubCategoryItemImages(): HasMany
    {
        return $this->hasMany(SubCategoryItemImages::class, 'sub_categories_items_id', 'id');
    }

}
