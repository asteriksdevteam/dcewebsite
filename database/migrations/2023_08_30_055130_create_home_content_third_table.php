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
        Schema::create('home_content_third', function (Blueprint $table) {
            $table->id();
            $table->string('heading1');
            $table->longtext('content1');
            $table->string('image1');
            $table->string('heading2');
            $table->longtext('content2');
            $table->string('image2');
            $table->string('heading3');
            $table->longtext('content3');
            $table->string('image3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_content_third');
    }
};
