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
        Schema::table('employee_details', function (Blueprint $table) {
            $table->string('current_location')->nullable();
            $table->string('highest_level_of_education')->nullable();
            $table->string('duty_station')->nullable();
            $table->string('software_expertise')->nullable();
            $table->string('language')->nullable();
            $table->string('software_expertise_level')->nullable();
            $table->string('level_of_responsibility')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_details', function (Blueprint $table) {
            $table->dropColumn([
                'current_location',
                'highest_level_of_education',
                'duty_station',
                'software_expertise',
                'language',
                'software_expertise_level',
                'level_of_responsibility',
            ]);
        });
    }
};
