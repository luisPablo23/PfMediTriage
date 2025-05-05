<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_id', 'receptionist_id', 'date', 'time', 'reason', 'status'];
    
    // Especifica los campos que deben ser tratados como fechas
    protected $dates = ['date'];
    
    // O en Laravel 8+ puedes usar:
    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime:H:i', // Esto es opcional para el campo time
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function receptionist()
    {
        return $this->belongsTo(User::class, 'receptionist_id');
    }
}