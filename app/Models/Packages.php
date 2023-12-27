<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Packages extends Model
{
    use HasFactory;

    protected $table = "packages";

    protected $fillable = [
        "subcategory",
        "package_type",
        "name",
        "discription",
        "Package_list",
    ];

    public function SubCategory(): HasOne
    {
        return $this->hasOne(SubCategory::class,'id','subcategory');
    }
    public function PackagesPrices(): HasOne
    {
        return $this->HasOne(PackagesPrices::class,'package_id','id');
    }

    public function PackagesPricesForAdmin(): HasMany
    {
        return $this->HasMany(PackagesPrices::class,'package_id','id');
    }
}
