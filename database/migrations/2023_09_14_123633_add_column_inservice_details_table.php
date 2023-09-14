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
        Schema::table('service_detail', function (Blueprint $table) {
            $table->string('meta_title')->after('sub_category');
            $table->longText('meta_keyword')->after('meta_title');
            $table->longText('meta_description')->after('meta_keyword');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_detail', function (Blueprint $table) {
            //
        });
    }
};
