<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {
    protected $fillable = [
        'patient_id', 
        'receptionist_id', 
        'date', 
        'time', 
        'reason', 
        'status'
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function receptionist() {
        return $this->belongsTo(User::class, 'receptionist_id');
    }
}
