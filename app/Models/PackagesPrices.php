<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PackagesPrices extends Model
{
    use HasFactory;

    protected $table = "packages_prices";

    protected $fillable = [
        "package_id",
        "country_name",
        "country_cut_price",
        "country_actual_price",
        "country_actual_yearly_price",
    ];

    public function Packages(): HasOne
    {
        return $this->hasOne(Packages::class,'id','package_id');
    }
    public function Currency(): HasOne
    {
        return $this->hasOne(Currency::class,'name','country_name');
    }
}
