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
            $table->string('first_banner_image')->after('banner_content');
            $table->longText('process_content')->after('first_banner_image');
            $table->string('info_banner_heading')->after('process_content');
            $table->longText('info_banner_content')->after('info_banner_heading');
            $table->string('info_banner_image')->after('info_banner_content');
            $table->string('info_banner_button_link')->after('info_banner_image');
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
