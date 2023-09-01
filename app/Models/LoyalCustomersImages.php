<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoyalCustomersImages extends Model
{
    use HasFactory;
    protected $table="home_loyal_customers_images";

    protected $fillable = ['images'];
}
