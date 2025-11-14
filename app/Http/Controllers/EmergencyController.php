<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\Patient;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index()
    {
        $emergencies = Emergency::with('patient')->latest()->paginate(10);
        return view('emergency.index', compact('emergencies'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        return view('emergency.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'        => 'required|exists:patients,id',
            'gravedad'          => 'required|string|max:50',
            'descripcion'       => 'nullable|string',
            'fecha_emergencia'  => 'required|date',
        ]);

        Emergency::create($request->all());

        return redirect()->route('emergency.index')
            ->with('success', 'Emergencia registrada correctamente.');
    }

    public function show(Emergency $emergency)
    {
        return view('emergency.show', compact('emergency'));
    }

    public function edit(Emergency $emergency)
    {
        $patients = Patient::orderBy('name')->get();
        return view('emergency.edit', compact('emergency', 'patients'));
    }

    public function update(Request $request, Emergency $emergency)
    {
        $request->validate([
            'patient_id'        => 'required|exists:patients,id',
            'gravedad'          => 'required|string|max:50',
            'descripcion'       => 'nullable|string',
            'fecha_emergencia'  => 'required|date',
        ]);

        $emergency->update($request->all());

        return redirect()->route('emergency.index')
            ->with('success', 'Emergencia actualizada correctamente.');
    }

    public function destroy(Emergency $emergency)
    {
        $emergency->delete();

        return redirect()->route('emergency.index')
            ->with('success', 'Emergencia eliminada correctamente.');
    }
}
