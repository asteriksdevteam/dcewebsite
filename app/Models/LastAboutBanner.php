<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastAboutBanner extends Model
{
    use HasFactory;

    protected $table = "last_about_banner";

    protected $fillable = [
        'heading','content','image'
    ];
}
