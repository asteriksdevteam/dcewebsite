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
        Schema::create('home_content_second', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->string('heading_one');
            $table->longText('content_one');
            $table->string('image_one');
            $table->string('heading_second');
            $table->longText('content_second');
            $table->string('image_second');
            $table->string('heading_third');
            $table->longText('content_third');
            $table->string('image_third');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_content_second');
    }
};
