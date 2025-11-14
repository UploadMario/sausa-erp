<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::orderBy('id', 'desc')->get();
        return view('pharmacy.index', compact('medicines'));
    }

    public function create()
    {
        return view('pharmacy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'presentation' => 'nullable|string|max:100',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'laboratory' => 'nullable|string|max:100',
        ]);

        Medicine::create($request->all());
        return redirect()->route('pharmacy.index')->with('success', '✅ Medicamento registrado correctamente.');
    }

    public function edit(Medicine $medicine)
    {
        return view('pharmacy.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'presentation' => 'nullable|string|max:100',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'laboratory' => 'nullable|string|max:100',
        ]);

        $medicine->update($request->all());
        return redirect()->route('pharmacy.index')->with('success', '✅ Medicamento actualizado correctamente.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('pharmacy.index')->with('success', '🗑️ Medicamento eliminado correctamente.');
    }
}
