<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MedicalHistory extends Model
{
    protected $fillable = ['patient_id', 'condition', 'treatment', 'date'];
    
    // Para Laravel 7.x o anterior:
    protected $dates = ['date'];
    
    // Para Laravel 8.x o superior (recomendado):
    protected $casts = [
        'date' => 'datetime',
    ];
    
    // Accesor para el formato de fecha
    public function getFormattedDateAttribute()
    {
        return $this->date ? $this->date->format('d/m/Y') : '';
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}