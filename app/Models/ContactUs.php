<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = "contact_us";

    protected $fillable = [
        "company",
        "package_id",
        "currency",
        "yearly_monthly",
        "name",
        "email",
        "phone",
        "subject",
        "text",
        "countryName",
        "countryCode",
        "regionCode",
        "regionName",
        "cityName",
        "zipCode",
        "latitude",
        "longitude",
        "areaCode",
        "timezone",
    ];

    public function Category(): HasOne
    {
        return $this->HasOne(Category::class,'id','subject');
    }
    
    public function Package(): HasOne
    {
        return $this->HasOne(Packages::class,'id','package_id');
    }

}
