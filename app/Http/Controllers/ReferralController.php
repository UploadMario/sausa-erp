<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\Patient;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $referrals = Referral::with('patient')->latest()->paginate(10);
        return view('referral.index', compact('referrals'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();
        return view('referral.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'        => 'required|exists:patients,id',
            'destino'           => 'required|string|max:100',
            'fecha_referencia'  => 'required|date',
            'motivo'            => 'nullable|string',
            'tipo'              => 'nullable|string|max:50',
        ]);

        Referral::create($request->all());

        return redirect()->route('referral.index')
            ->with('success', 'Referencia registrada correctamente.');
    }

    public function show(Referral $referral)
    {
        return view('referral.show', compact('referral'));
    }

    public function edit(Referral $referral)
    {
        $patients = Patient::orderBy('name')->get();
        return view('referral.edit', compact('referral', 'patients'));
    }

    public function update(Request $request, Referral $referral)
    {
        $request->validate([
            'patient_id'        => 'required|exists:patients,id',
            'destino'           => 'required|string|max:100',
            'fecha_referencia'  => 'required|date',
            'motivo'            => 'nullable|string',
            'tipo'              => 'nullable|string|max:50',
        ]);

        $referral->update($request->all());

        return redirect()->route('referral.index')
            ->with('success', 'Referencia actualizada correctamente.');
    }

    public function destroy(Referral $referral)
    {
        $referral->delete();

        return redirect()->route('referral.index')
            ->with('success', 'Referencia eliminada correctamente.');
    }
}
