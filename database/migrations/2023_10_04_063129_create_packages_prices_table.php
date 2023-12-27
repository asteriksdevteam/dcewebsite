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
        Schema::create('packages_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id');
            $table->string('country_cut_name_price');
            $table->string('country_cut_price');
            $table->string('country_actual_name_price');
            $table->string('country_actual_price');
            $table->string('country_actual_name_yearly_price');
            $table->string('country_actual_yearly_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages_prices');
    }
};
