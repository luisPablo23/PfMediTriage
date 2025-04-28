<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TriageEntry;

use App\Models\Patient; 


class TriageEntryController extends Controller
{
    public function index()
    {
        $triageEntries = TriageEntry::with('patient', 'nurse')->get();
        return view('triage_entries.index', compact('triageEntries'));
    }

    public function create()
    {
        
        $patients = Patient::all(); // Obtener todos los pacientes
        return view('triage_entries.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'heart_rate' => 'nullable|integer',
            'blood_pressure' => 'nullable|string|max:10',
            'temperature' => 'nullable|numeric|between:30,45',
            'oxygen_saturation' => 'nullable|numeric|between:0,100',
            'respiratory_rate' => 'nullable|integer',
            'symptoms' => 'required|string',
            'priority' => 'required|in:red,yellow,green,blue,black',
            'notes' => 'nullable|string',
        ]);
    
        TriageEntry::create([
            'patient_id' => $request->patient_id,
            'nurse_id' => auth()->id(),
            'heart_rate' => $request->heart_rate,
            'blood_pressure' => $request->blood_pressure,
            'temperature' => $request->temperature,
            'oxygen_saturation' => $request->oxygen_saturation,
            'respiratory_rate' => $request->respiratory_rate,
            'symptoms' => $request->symptoms,
            'priority' => $request->priority,
            'notes' => $request->notes,
        ]);
    
        return redirect()->route('triage_entries.index')->with('success', 'Triaje creado correctamente.');
    }
    

    public function edit(TriageEntry $triageEntry)
    {
        return view('triage_entries.edit', compact('triageEntry'));
    }

    public function update(Request $request, TriageEntry $triageEntry)
    {
        $request->validate([
            // No se valida el patient_id ni nurse_id porque ya existen
            'heart_rate' => 'nullable|integer',
            'blood_pressure' => 'nullable|string|max:10',
            'temperature' => 'nullable|numeric|between:30,45',
            'oxygen_saturation' => 'nullable|numeric|between:0,100',
            'respiratory_rate' => 'nullable|integer',
            'symptoms' => 'required|string',
            'priority' => 'required|in:red,yellow,green,blue,black',
            'notes' => 'nullable|string',
        ]);
    
        $triageEntry->update([
            'heart_rate' => $request->heart_rate,
            'blood_pressure' => $request->blood_pressure,
            'temperature' => $request->temperature,
            'oxygen_saturation' => $request->oxygen_saturation,
            'respiratory_rate' => $request->respiratory_rate,
            'symptoms' => $request->symptoms,
            'priority' => $request->priority,
            'notes' => $request->notes,
        ]);
    
        return redirect()->route('triage_entries.index')->with('success', 'Entrada de triaje actualizada exitosamente.');
    }
    

    public function destroy(TriageEntry $triageEntry)
    {
        $triageEntry->delete();

        return redirect()->route('triage_entries.index')->with('success', 'Entrada de triage eliminada exitosamente.');
    }
}