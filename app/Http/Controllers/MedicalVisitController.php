<?php

namespace App\Http\Controllers;

use App\Models\MedicalVisit;
use App\Models\TriageEntry;
use App\Models\User;
use Illuminate\Http\Request;

class MedicalVisitController extends Controller
{
    public function index()
    {
        $medicalVisits = MedicalVisit::with('triageEntry', 'doctor')->get();
        return view('medical_visits.index', compact('medicalVisits'));
    }

    public function create()
    {
        $triageEntries = TriageEntry::all();
        $doctors = User::where('role', 'doctor')->get();
        return view('medical_visits.create', compact('triageEntries', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'triage_entry_id' => 'required|exists:triage_entries,id',
            'doctor_id' => 'required|exists:users,id',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'status' => 'required|string',
        ]);

        MedicalVisit::create($request->all());

        return redirect()->route('medical_visits.index')->with('success', 'Medical visit created successfully');
    }

    public function show(MedicalVisit $medicalVisit)
    {
        return view('medical_visits.show', compact('medicalVisit'));
    }

    public function edit(MedicalVisit $medicalVisit)
    {
        $triageEntries = TriageEntry::all();
        $doctors = User::where('role', 'doctor')->get();
        return view('medical_visits.edit', compact('medicalVisit', 'triageEntries', 'doctors'));
    }

    public function update(Request $request, MedicalVisit $medicalVisit)
    {
        $request->validate([
            'triage_entry_id' => 'required|exists:triage_entries,id',
            'doctor_id' => 'required|exists:users,id',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'status' => 'required|string',
        ]);

        $medicalVisit->update($request->all());

        return redirect()->route('medical_visits.index')->with('success', 'Medical visit updated successfully');
    }

    public function destroy(MedicalVisit $medicalVisit)
    {
        $medicalVisit->delete();
        return redirect()->route('medical_visits.index')->with('success', 'Medical visit deleted successfully');
    }
}
