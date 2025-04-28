<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TriageEntryController;
use App\Http\Controllers\MedicalVisitController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Primero rutas personalizadas

    Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');

    
    // Luego el resource
    Route::resource('patients', PatientController::class);
// Define tu ruta personalizada primero
Route::get('/prescriptions/create/{medicalVisitId}', [PrescriptionController::class, 'create'])->name('prescriptions.create');

// Luego, usa el resource sin la ruta create
Route::resource('prescriptions', PrescriptionController::class)->except(['create']);

    // El resto de resources
    Route::resource('triage_entries', TriageEntryController::class);
    Route::resource('medical_visits', MedicalVisitController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('specialties', SpecialtyController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('medical_histories', MedicalHistoryController::class);
    


    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
