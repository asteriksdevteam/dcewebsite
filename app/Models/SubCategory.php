<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class SubCategory extends Model
{
    use HasFactory;

    protected $table = "sub_categories";

    protected $fillable = [
        "category_id",
        "slug",
        "sub_category_name",
    ];
    public function Category(): HasOne
    {
        return $this->HasOne(Category::class,'id','category_id');
    }
    public function SubCategoryItem(): HasMany
    {
        return $this->hasMany(SubCategoryItem::class, 'sub_category_id', 'id');
    }
    public function ServiceDetail(): HasOne
    {
        return $this->HasOne(ServiceDetail::class,'sub_category','id');
    }

}
