<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $table = "meta_tag";

    protected $fillable = [
        'page','meta_title','meta_keyword','meta_description'
    ];
}
