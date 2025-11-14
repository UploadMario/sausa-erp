<?php

namespace App\Http\Controllers;

use App\Models\Extramural;
use App\Models\Patient;
use Illuminate\Http\Request;

class ExtramuralController extends Controller
{
    public function index()
    {
        $extramurals = Extramural::with('patient')->latest()->paginate(10);
        return view('extramural.index', compact('extramurals'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        return view('extramural.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'        => 'nullable|exists:patients,id',
            'nombre_actividad'  => 'required|string|max:100',
            'tipo'              => 'required|string|max:50',
            'fecha'             => 'required|date',
            'descripcion'       => 'nullable|string',
        ]);

        Extramural::create($request->all());

        return redirect()->route('extramural.index')
            ->with('success', 'Actividad extramural registrada correctamente.');
    }

    public function show(Extramural $extramural)
    {
        return view('extramural.show', compact('extramural'));
    }

    public function edit(Extramural $extramural)
    {
        $patients = Patient::orderBy('name')->get();
        return view('extramural.edit', compact('extramural', 'patients'));
    }

    public function update(Request $request, Extramural $extramural)
    {
        $request->validate([
            'patient_id'        => 'nullable|exists:patients,id',
            'nombre_actividad'  => 'required|string|max:100',
            'tipo'              => 'required|string|max:50',
            'fecha'             => 'required|date',
            'descripcion'       => 'nullable|string',
        ]);

        $extramural->update($request->all());

        return redirect()->route('extramural.index')
            ->with('success', 'Actividad extramural actualizada correctamente.');
    }

    public function destroy(Extramural $extramural)
    {
        $extramural->delete();

        return redirect()->route('extramural.index')
            ->with('success', 'Actividad extramural eliminada correctamente.');
    }
}
