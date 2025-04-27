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
        Schema::create('medical_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('triage_entry_id')->constrained();
            $table->foreignId('doctor_id')->constrained('users');
            $table->text('diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->enum('status', ['pending', 'completed', 'referred'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_visits');
    }
};
