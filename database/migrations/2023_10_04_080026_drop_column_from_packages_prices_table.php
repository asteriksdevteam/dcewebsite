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
        Schema::table('packages_prices', function (Blueprint $table) {
            $table->dropColumn('country_cut_name_price');
            $table->dropColumn('country_actual_name_price');
            $table->dropColumn('country_actual_name_yearly_price');
            $table->string('country_name')->after('package_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages_prices', function (Blueprint $table) {
            //
        });
    }
};
