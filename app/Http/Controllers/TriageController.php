<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TriageEntry;
use App\Models\Patient;
use App\Models\User;

class TriageController extends Controller
{
    public function index()
    {
        $triages = TriageEntry::with('patient', 'nurse')->latest()->get();
        return view('triages.index', compact('triages'));
    }

    public function create()
    {
        $patients = Patient::all();
        $nurses = User::all();
        return view('triages.create', compact('patients', 'nurses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'nurse_id' => 'required',
            'symptoms' => 'required',
            'priority' => 'required',
        ]);

        TriageEntry::create($request->all());

        return redirect()->route('triages.index')->with('success', 'Triaje creado exitosamente.');
    }

    public function edit(TriageEntry $triage)
    {
        $patients = Patient::all();
        $nurses = User::all();
        return view('triages.edit', compact('triage', 'patients', 'nurses'));
    }

    public function update(Request $request, TriageEntry $triage)
    {
        $request->validate([
            'patient_id' => 'required',
            'nurse_id' => 'required',
            'symptoms' => 'required',
            'priority' => 'required',
        ]);

        $triage->update($request->all());

        return redirect()->route('triages.index')->with('success', 'Triaje actualizado exitosamente.');
    }

    public function destroy(TriageEntry $triage)
    {
        $triage->delete();
        return redirect()->route('triages.index')->with('success', 'Triaje eliminado exitosamente.');
    }
}