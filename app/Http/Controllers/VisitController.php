<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Patient;

class VisitController extends Controller
{
    public function index()
    {
        // Obtiene todas las atenciones con su paciente relacionado
        $visits = Visit::with('patient')->get();
        return view('visits.index', compact('visits'));
    }

    public function create()
    {
        // Lista de pacientes para elegir
        $patients = Patient::all();
        return view('visits.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'reason' => 'required|string|max:255',
            'diagnosis' => 'nullable|string',
            'status' => 'required|string'
        ]);

        Visit::create($request->all());

        return redirect()->route('visits.index')
            ->with('success', 'Atención registrada correctamente.');
    }

    public function edit(Visit $visit)
    {
        $patients = Patient::all();
        return view('visits.edit', compact('visit', 'patients'));
    }

    public function update(Request $request, Visit $visit)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'reason' => 'required|string|max:255',
            'diagnosis' => 'nullable|string',
            'status' => 'required|string'
        ]);

        $visit->update($request->all());

        return redirect()->route('visits.index')
            ->with('success', 'Atención actualizada correctamente.');
    }

    public function destroy(Visit $visit)
    {
        $visit->delete();
        return redirect()->route('visits.index')
            ->with('success', 'Atención eliminada correctamente.');
    }
}
