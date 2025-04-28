<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;

class MedicalHistoryController extends Controller
{
    public function index()
    {
        $medicalHistories = MedicalHistory::with('patient')->get();
        return view('medical_histories.index', compact('medicalHistories'));
    }

    public function create()
    {
        return view('medical_histories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'condition' => 'required|string',
            'treatment' => 'nullable|string',
            'date' => 'required|date',
        ]);

        MedicalHistory::create($request->all());

        return redirect()->route('medical_histories.index')->with('success', 'Historial médico creado exitosamente.');
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
