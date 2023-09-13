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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title');
            $table->longText('meta_keyword');
            $table->longText('meta_description');
            $table->string('blog_name');
            $table->string('category');
            $table->string('blog_image');
            $table->string('blog_image_thumb');
            $table->longText('blog_short_description');
            $table->longText('blog_description');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
