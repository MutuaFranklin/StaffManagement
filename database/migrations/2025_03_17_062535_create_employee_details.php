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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users');
            $table->string('index_number');
            $table->string('job_title')->nullable();
            $table->foreignId('contract_type_id')->constrained('contract_types')->nullable();
            $table->foreignId('duty_station_id')->constrained('duty_stations')->nullable();
            $table->foreignId('branch_unit_id')->constrained('branch_units')->nullable();
            $table->foreignId('division_id')->constrained('divisions')->nullable();
            $table->foreignId('fro_id')->constrained('users')->nullable();
            $table->foreignId('sro_id')->constrained('users')->nullable();
            $table->date('start_date')->nullable()->nullable();
            $table->date('end_date')->nullable()->nullable();
            $table->enum('status', ['Active', 'Separated', 'Retired', 'Terminated'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
