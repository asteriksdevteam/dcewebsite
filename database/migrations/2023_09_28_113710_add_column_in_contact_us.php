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
        Schema::table('contact_us', function (Blueprint $table) {
            $table->string('countryName')->after('text')->nullable();
            $table->string('countryCode')->after('countryName')->nullable();
            $table->string('regionCode')->after('countryCode')->nullable();
            $table->string('regionName')->after('regionCode')->nullable();
            $table->string('cityName')->after('regionName')->nullable();
            $table->string('zipCode')->after('cityName')->nullable();
            $table->string('latitude')->after('zipCode')->nullable();
            $table->string('longitude')->after('latitude')->nullable();
            $table->string('areaCode')->after('longitude')->nullable();
            $table->string('timezone')->after('areaCode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            //
        });
    }
};
