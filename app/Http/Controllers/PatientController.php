<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('id', 'desc')->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'dni' => 'required|digits:8|unique:patients',
            'age' => 'nullable|integer|min:0|max:120',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:200',
        ]);

        Patient::create($request->all());

        return redirect()->route('pacientes.index')->with('success', '✅ Paciente registrado correctamente.');
    }

    public function edit(Patient $paciente)
    {
        return view('patients.edit', compact('paciente'));
    }

    public function update(Request $request, Patient $paciente)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'dni' => 'required|digits:8|unique:patients,dni,' . $paciente->id,
            'age' => 'nullable|integer|min:0|max:120',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:200',
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('success', '✅ Paciente actualizado correctamente.');
    }

    public function destroy(Patient $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', '🗑️ Paciente eliminado correctamente.');
    }
}
