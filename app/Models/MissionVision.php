<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionVision extends Model
{
    use HasFactory;
    protected $table = "about_us_mission_vision";

    protected $fillable = [
        'about_content',
        'image'
    ];
}
