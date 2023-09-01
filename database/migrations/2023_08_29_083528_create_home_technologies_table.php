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
        Schema::create('home_technologies', function (Blueprint $table) {
            $table->id();
            $table->string('heading_technologies');
            $table->longText('content_technologies');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('image_4');
            $table->string('image_5');
            $table->string('image_6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_technologies');
    }
};
