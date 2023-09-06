<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class ServiceDetail extends Model
{
    use HasFactory;

    protected $table = "service_detail";

    protected $fillable = [
        "sub_category",
        "banner_heading",
        "banner_content",
        "about_content",
        "banner_image_service_detail",
    ];

    public function SubCategory(): HasOne
    {
        return $this->hasOne(SubCategory::class,'id','sub_category');
    }
}
