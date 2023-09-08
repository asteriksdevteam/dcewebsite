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
        Schema::create('about_us_our_philosophy', function (Blueprint $table) {
            $table->id();
            $table->string("first_heading");
            $table->longText("first_content");
            $table->string("second_heading");
            $table->longText("second_content");
            $table->string("third_heading");
            $table->longText("third_content");
            $table->string("fourth_heading");
            $table->longText("fourth_content");
            $table->string("fifth_heading");
            $table->longText("fifth_content");
            $table->string("sixth_heading");
            $table->longText("sixth_content");
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_our_philosophy');
    }
};
