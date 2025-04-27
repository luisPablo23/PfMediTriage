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
        Schema::create('triage_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('nurse_id')->constrained('users');
            $table->integer('heart_rate')->nullable();
            $table->string('blood_pressure', 10)->nullable(); // Ej: "120/80"
            $table->decimal('temperature', 3, 1)->nullable(); // Ej: 36.5
            $table->decimal('oxygen_saturation', 3, 1)->nullable(); // Ej: 98.5
            $table->integer('respiratory_rate')->nullable();
            $table->text('symptoms');
            $table->enum('priority', ['red', 'yellow', 'green', 'blue', 'black']);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triage_entries');
    }
};
