<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class ServiceDetailProcess extends Model
{
    use HasFactory;

    protected $table = "service_detail_process";

    protected $fillable = [
        "image",
        "service_detail_id",
        "heading",
        "content",
    ];
}
