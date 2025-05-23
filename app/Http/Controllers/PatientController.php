<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with(['triageEntries' => function($query) {
            $query->latest()->take(1);
        }])->get();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:0',
            'identification_number' => 'required|string|max:255|unique:patients',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente creado exitosamente.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:0',
            'identification_number' => 'required|string|max:255|unique:patients,identification_number,' . $patient->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    public function search(Request $request)
    {
        try {
            $identificationNumber = $request->get('identification_number');
    
            if (empty($identificationNumber)) {
                return response()->json(['error' => 'Número de identificación es requerido'], 400);
            }
    
            $patients = Patient::where('identification_number', $identificationNumber)->get();
    
            return response()->json($patients);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar el paciente: ' . $e->getMessage()], 500);
        }
    }
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }
        

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}