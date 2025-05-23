<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalVisit extends Model {
    protected $fillable = [
        'triage_entry_id', 
        'doctor_id', 
        'diagnosis', 
        'treatment', 
        'status'
    ];

    public function triageEntry() {
        return $this->belongsTo(TriageEntry::class);
    }

    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function prescriptions() {
        return $this->hasMany(Prescription::class);
    }
    
}