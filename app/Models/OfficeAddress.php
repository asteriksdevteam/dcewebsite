<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeAddress extends Model
{
    use HasFactory;
    
    protected $table = "office_address";
    protected $fillable = [
        'office_detail'
    ];
}
