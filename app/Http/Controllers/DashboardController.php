<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\TriageEntry;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latestDoctors = Doctor::with('user', 'specialty')
            ->latest()
            ->take(8)
            ->get();

        $prioritiesCount = [
            'red' => TriageEntry::where('priority', 'red')->count(),
            'yellow' => TriageEntry::where('priority', 'yellow')->count(),
            'green' => TriageEntry::where('priority', 'green')->count(),
            'blue' => TriageEntry::where('priority', 'blue')->count(),
            'black' => TriageEntry::where('priority', 'black')->count(),
        ];

        // Obtener cantidad de pacientes distintos que tuvieron visitas médicas por mes
        $monthlyPatients = DB::table('patients')
        ->join('triage_entries', 'patients.id', '=', 'triage_entries.patient_id')
        ->join('medical_visits', 'triage_entries.id', '=', 'medical_visits.triage_entry_id')
        ->selectRaw('MONTH(medical_visits.created_at) as month, COUNT(DISTINCT patients.id) as count')
        ->whereYear('medical_visits.created_at', now()->year)
        ->groupByRaw('MONTH(medical_visits.created_at)')
        ->orderByRaw('MONTH(medical_visits.created_at)')
        ->get()
        ->pluck('count', 'month');

    // Rellenar los 12 meses
    $monthsPatients = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlyPatients) {
        return [$month => $monthlyPatients->get($month, 0)];
    });

    return view('dashboard', compact('latestDoctors', 'prioritiesCount', 'monthsPatients'));
    }
}