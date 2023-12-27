<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_testimonial', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('testimonial_heading_1');
            $table->string('testimonial_heading_2');
            $table->string('testimonial_heading_3');
            $table->string('testimonial_heading_4');
            $table->string('testimonial_name_1');
            $table->string('testimonial_name_2');
            $table->string('testimonial_name_3');
            $table->string('testimonial_name_4');
            $table->string('testimonial_designation_1');
            $table->string('testimonial_designation_2');
            $table->string('testimonial_designation_3');
            $table->string('testimonial_designation_4');
            $table->longText('testimonial_content_1');
            $table->longText('testimonial_content_2');
            $table->longText('testimonial_content_3');
            $table->longText('testimonial_content_4');
            $table->string('testimonial_image_1');
            $table->string('testimonial_image_2');
            $table->string('testimonial_image_3');
            $table->string('testimonial_image_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_testimonial');
    }
};
