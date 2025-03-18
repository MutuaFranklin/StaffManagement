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
        Schema::create('staff_details', function (Blueprint $table) {
            $table->id();
            $table->string('index_number')->unique();
            $table->foreignId('staff_id')->constrained('users');
            $table->string('current_location');
            $table->string('highest_level_of_education');
            $table->foreignId('duty_station_id')->constrained('duty_stations');
            $table->string('software_expertise');
            $table->enum('language', ['English', 'French', 'Spanish', 'Portuguese', 'Arabic', 'Russian', 'Chinese']);
            $table->enum('software_expertise_level', ['Entry', 'Intermediate', 'Advanced']);
            $table->string('level_of_responsibility');
            $table->string('availability_for_remote_work');	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_details');
    }
};
