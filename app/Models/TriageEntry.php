<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TriageEntry extends Model
{
    protected $fillable = [
        'patient_id', 'nurse_id', 'heart_rate', 'blood_pressure',
        'temperature', 'oxygen_saturation', 'respiratory_rate',
        'symptoms', 'priority', 'notes'
    ];
    
    // Para Laravel 7.x o anterior:
    protected $dates = ['created_at', 'updated_at'];
    
    // Para Laravel 8.x o superior (recomendado):
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }

    public function medicalVisit() {
        return $this->hasOne(MedicalVisit::class);
    }
}