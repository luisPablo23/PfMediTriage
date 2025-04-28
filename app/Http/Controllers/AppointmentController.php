<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient', 'receptionist')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'receptionist_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required|time',
            'reason' => 'required|string',
            'status' => 'required|in:scheduled,canceled,completed',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Cita creada exitosamente.');
    }

    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'receptionist_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required|time',
            'reason' => 'required|string',
            'status' => 'required|in:scheduled,canceled,completed',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Cita actualizada exitosamente.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
