<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::with('patient')->latest()->paginate(10);
        return view('admission.index', compact('admissions'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        return view('admission.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'     => 'required|exists:patients,id',
            'fecha_ingreso'  => 'required|date',
            'motivo'         => 'nullable|string|max:255',
            'estado_admision'=> 'nullable|string|max:50',
        ]);

        Admission::create($request->all());

        return redirect()->route('admission.index')
            ->with('success', 'Admisión registrada correctamente.');
    }

    public function show(Admission $admission)
    {
        return view('admission.show', compact('admission'));
    }

    public function edit(Admission $admission)
    {
        $patients = Patient::orderBy('name')->get();
        return view('admission.edit', compact('admission', 'patients'));
    }

    public function update(Request $request, Admission $admission)
    {
        $request->validate([
            'patient_id'     => 'required|exists:patients,id',
            'fecha_ingreso'  => 'required|date',
            'motivo'         => 'nullable|string|max:255',
            'estado_admision'=> 'nullable|string|max:50',
        ]);

        $admission->update($request->all());

        return redirect()->route('admission.index')
            ->with('success', 'Admisión actualizada correctamente.');
    }

    public function destroy(Admission $admission)
    {
        $admission->delete();

        return redirect()->route('admission.index')
            ->with('success', 'Admisión eliminada correctamente.');
    }
}
