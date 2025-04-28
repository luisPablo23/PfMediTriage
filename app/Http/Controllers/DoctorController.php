<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user', 'specialty')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'doctor', // asignamos el rol
            'password' => Hash::make('Aa1234567*'), // contraseña aleatoria
        ]);

        // Crear el doctor relacionado
        Doctor::create([
            'user_id' => $user->id,
            'specialty_id' => $request->specialty_id,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Médico creado correctamente.');
    }

    public function edit(Doctor $doctor)
    {
        $specialties = Specialty::all();
        return view('doctors.edit', compact('doctor', 'specialties'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $doctor->user_id,
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        // Actualizar datos del usuario relacionado
        $doctor->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Actualizar la especialidad del doctor
        $doctor->update([
            'specialty_id' => $request->specialty_id,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Médico actualizado correctamente.');
    }

    public function destroy(Doctor $doctor)
    {
        // Primero eliminamos el usuario relacionado
        $doctor->user->delete();

        // Luego eliminamos el doctor
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Médico eliminado correctamente.');
    }
}
