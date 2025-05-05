<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\Patient;

class MedicalHistoryController extends Controller
{
    public function index()
    {
        $medicalHistories = MedicalHistory::with('patient')->get();
        return view('medical_histories.index', compact('medicalHistories'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get(); // Obtener todos los pacientes ordenados
        return view('medical_histories.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'condition' => 'required|string|max:1000',
            'treatment' => 'nullable|string|max:1000',
            'date' => 'required|date',
        ]);

        // Parsear la fecha para asegurar formato correcto
        $validated['date'] = \Carbon\Carbon::parse($validated['date']);

        MedicalHistory::create($validated);

        return redirect()->route('medical_histories.index')
                        ->with('success', 'Historial médico creado exitosamente.');
    }

    public function edit(MedicalHistory $medicalHistory)
    {
        return view('medical_histories.edit', compact('medicalHistory'));
    }

    public function update(Request $request, MedicalHistory $medicalHistory)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'condition' => 'required|string',
            'treatment' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $medicalHistory->update($request->all());

        return redirect()->route('medical_histories.index')->with('success', 'Historial médico actualizado exitosamente.');
    }

    public function destroy(MedicalHistory $medicalHistory)
    {
        $medicalHistory->delete();

        return redirect()->route('medical_histories.index')->with('success', 'Historial médico eliminado exitosamente.');
    }
}
