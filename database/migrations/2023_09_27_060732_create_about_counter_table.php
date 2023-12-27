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
        Schema::create('about_counter', function (Blueprint $table) {
            $table->id();
            $table->integer("counter1");
            $table->string("counter1_name");
            $table->integer("counter2");
            $table->string("counter2_name");
            $table->integer("counter3");
            $table->string("counter3_name");
            $table->integer("counter4");
            $table->string("counter4_name");
            $table->string("counter_image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_counter');
    }
};
