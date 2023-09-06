<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServicesHome extends Model
{
    use HasFactory;
    protected $table = "our_services_home";

    protected $fillable = [
        "name",
        "description",
        "image"
    ];
}
