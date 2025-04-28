<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\MedicalVisit;
use Illuminate\Http\Request;


class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::all();  // Obtener todas las recetas
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create($medicalVisitId)
    {
        // Intentamos obtener la visita médica por ID
        $medicalVisit = MedicalVisit::findOrFail($medicalVisitId);
        
        // Verifica si la visita médica existe
    
        // Si se encuentra la visita médica, la pasa a la vista
        return view('prescriptions.create', compact('medicalVisit'));
    }
    
    
    
    
    

    
    
    
    public function store(Request $request)
    {
        $request->validate([
            'medication' => 'required|string',
            'dosage' => 'required|string',
            'instructions' => 'required|string',
            'medical_visit_id' => 'required|exists:medical_visits,id', // Asegura que el ID de la visita médica sea válido
        ]);
    
        Prescription::create([
            'medical_visit_id' => $request->medical_visit_id,
            'medication' => $request->medication,
            'dosage' => $request->dosage,
            'instructions' => $request->instructions,
        ]);
    
        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully');
    }
    
    

    public function edit(Prescription $prescription)
    {
        $medicalVisits = MedicalVisit::all();
        return view('prescriptions.edit', compact('prescription', 'medicalVisits'));
    }

    public function update(Request $request, Prescription $prescription)
    {
        $validated = $request->validate([
            'medical_visit_id' => 'required|exists:medical_visits,id',
            'medication' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'instructions' => 'required|string|max:255',
        ]);

        $prescription->update($validated);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully');
    }
}
