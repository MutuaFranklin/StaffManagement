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
        Schema::create('branch_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('head_id')->constrained('users');
            $table->foreignId('division_id')->constrained('divisions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_units');
    }
};
