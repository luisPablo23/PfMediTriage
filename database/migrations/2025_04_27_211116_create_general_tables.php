<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabla de usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('role', ['admin', 'doctor', 'nurse', 'receptionist'])->default('receptionist');
            $table->timestamps();
        });

        // Tabla de pacientes
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->integer('age');
            $table->string('identification_number')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        // Tabla de triage
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

        // Tabla de visitas médicas
        Schema::create('medical_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('triage_entry_id')->constrained();
            $table->foreignId('doctor_id')->constrained('users');
            $table->text('diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->enum('status', ['pending', 'completed', 'referred'])->default('pending');
            $table->timestamps();
        });

        // Tabla de citas
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('receptionist_id')->constrained('users');
            $table->date('date');
            $table->time('time');
            $table->text('reason');
            $table->enum('status', ['scheduled', 'canceled', 'completed'])->default('scheduled');
            $table->timestamps();
        });

        // Tabla de especialidades
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Tabla de doctores
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('specialty_id')->constrained();
            $table->timestamps();
        });

        // Tabla de historial médico
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->text('condition');
            $table->text('treatment');
            $table->date('date');
            $table->timestamps();
        });

        // Tabla de recetas médicas
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_visit_id')->constrained();
            $table->text('medication');
            $table->string('dosage');
            $table->text('instructions')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
        Schema::dropIfExists('medical_histories');
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('specialties');
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('medical_visits');
        Schema::dropIfExists('triage_entries');
        Schema::dropIfExists('patients');
        Schema::dropIfExists('users');
    }
};
