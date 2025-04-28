<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model {
    protected $fillable = ['medical_visit_id', 'medication', 'dosage', 'instructions'];

    public function medicalVisit() {
        return $this->belongsTo(MedicalVisit::class);
    }
}