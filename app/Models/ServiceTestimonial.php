<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTestimonial extends Model
{
    use HasFactory;

    protected $table = 'service_testimonial';

    protected $fillable = [
        'service_id',
        'testimonial_heading_1',
        'testimonial_heading_2',
        'testimonial_heading_3',
        'testimonial_heading_4',
        'testimonial_name_1',
        'testimonial_name_2',
        'testimonial_name_3',
        'testimonial_name_4',
        'testimonial_designation_1',
        'testimonial_designation_2',
        'testimonial_designation_3',
        'testimonial_designation_4',
        'testimonial_content_1',
        'testimonial_content_2',
        'testimonial_content_3',
        'testimonial_content_4',
        'testimonial_image_1',
        'testimonial_image_2',
        'testimonial_image_3',
        'testimonial_image_4',  
    ];
}
