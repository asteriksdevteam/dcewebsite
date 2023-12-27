<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCounter extends Model
{
    use HasFactory;

    protected $table = "about_counter";

    protected $fillable = [
        "counter1",
        "counter1_name",
        "counter2",
        "counter2_name",
        "counter3",
        "counter3_name",
        "counter4",
        "counter4_name",
        "counter_image",
    ];
}
