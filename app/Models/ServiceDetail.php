<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class ServiceDetail extends Model
{
    use HasFactory;

    protected $table = "service_detail";

    protected $fillable = [
        "meta_title",
        "meta_keyword",
        "meta_description",
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
    public function ServiceDetailProcess(): HasMany
    {
        return $this->hasMany(ServiceDetailProcess::class,'service_detail_id','id');
    }
}
