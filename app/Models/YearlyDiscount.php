<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyDiscount extends Model
{
    use HasFactory;
    protected $table = "yearly_discount";

    protected $fillable = [
        "yearly_discount",
    ];
}
