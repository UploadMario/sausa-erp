<?php

namespace App\Http\Controllers;

use App\Models\Alta;
use App\Models\Patient;
use Illuminate\Http\Request;

class AltaController extends Controller
{
    public function index()
    {
        $altas = Alta::with('patient')->latest()->paginate(10);
        return view('alta.index', compact('altas'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        return view('alta.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'   => 'required|exists:patients,id',
            'fecha_alta'   => 'required|date',
            'resumen'      => 'nullable|string',
        ]);

        Alta::create($request->all());

        return redirect()->route('alta.index')
            ->with('success', 'Alta registrada correctamente.');
    }

    public function show(Alta $alta)
    {
        return view('alta.show', compact('alta'));
    }

    public function edit(Alta $alta)
    {
        $patients = Patient::orderBy('name')->get();
        return view('alta.edit', compact('alta', 'patients'));
    }

    public function update(Request $request, Alta $alta)
    {
        $request->validate([
            'patient_id'   => 'required|exists:patients,id',
            'fecha_alta'   => 'required|date',
            'resumen'      => 'nullable|string',
        ]);

        $alta->update($request->all());

        return redirect()->route('alta.index')
            ->with('success', 'Alta actualizada correctamente.');
    }

    public function destroy(Alta $alta)
    {
        $alta->delete();

        return redirect()->route('alta.index')
            ->with('success', 'Alta eliminada correctamente.');
    }
}
