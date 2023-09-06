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
        Schema::create('service_detail', function (Blueprint $table) {
            $table->id();
            $table->string('sub_category');
            $table->string('banner_heading');
            $table->longText('banner_content');
            $table->longText('about_content');
            $table->string('banner_image_service_detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_detail');
    }
};
