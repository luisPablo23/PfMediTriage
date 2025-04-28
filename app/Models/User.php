<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'string',
    ];

    public function triageEntries() {
        return $this->hasMany(TriageEntry::class, 'nurse_id');
    }

    public function medicalVisits() {
        return $this->hasMany(MedicalVisit::class, 'doctor_id');
    }

    public function appointments() {
        return $this->hasMany(Appointment::class, 'receptionist_id');
    }
    
    public function specialty() {
        return $this->belongsTo(Specialty::class);
    }   
}