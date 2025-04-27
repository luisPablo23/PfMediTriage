<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
    protected $fillable = ['name', 'gender', 'age', 'identification_number', 'phone', 'address'];

    // Relaciones:
    public function triageEntries() {
        return $this->hasMany(TriageEntry::class);
    }

    public function medicalVisits() {
        return $this->hasManyThrough(MedicalVisit::class, TriageEntry::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
}
