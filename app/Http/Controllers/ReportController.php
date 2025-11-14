<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Visit;
use App\Models\Medicine;

class ReportController extends Controller
{
    public function index()
    {
        // Indicadores generales
        $totalPatients = Patient::count();
        $totalVisits = Visit::count();
        $totalMedicines = Medicine::count();

        // Medicamentos con bajo stock
        $lowStock = Medicine::where('stock', '<', 10)->count();

        // Últimos pacientes registrados (los 5 más recientes)
        $recentPatients = Patient::latest()->take(5)->get();

        // Retornar a la vista con todas las variables
        return view('reports.index', compact(
            'totalPatients',
            'totalVisits',
            'totalMedicines',
            'lowStock',
            'recentPatients'
        ));
    }
}
