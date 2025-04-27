<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Añade este campo
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    
    //castear el 'role' como string
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'string', // Añade esto si usas enums en PHP 8.1+
    ];
    
    // Relaciones según el rol:
    public function triageEntries() {
        return $this->hasMany(TriageEntry::class, 'nurse_id');
    }

    public function medicalVisits() {
        return $this->hasMany(MedicalVisit::class, 'doctor_id');
    }

    public function appointments() {
        return $this->hasMany(Appointment::class, 'receptionist_id');
    }
}
