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
        Schema::create('home_content_fourth', function (Blueprint $table) {
            $table->id();
            $table->string("heading");
            $table->longText("content");
            $table->string("image1");
            $table->string("heading1");
            $table->string("image2");
            $table->string("heading2");
            $table->string("image3");
            $table->string("heading3");
            $table->string("image4");
            $table->string("heading4");
            $table->string("image5");
            $table->string("heading5");
            $table->string("image6");
            $table->string("heading6");
            $table->string("image7");
            $table->string("heading7");
            $table->string("image8");
            $table->string("heading8");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_content_fourth');
    }
};
