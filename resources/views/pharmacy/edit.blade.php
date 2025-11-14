@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-warning mb-3"><i class="fa-solid fa-capsules"></i> Editar Medicamento</h2>

    <div class="mb-3">
        <a href="{{ route('pharmacy.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver al listado
        </a>
    </div>

    <form action="{{ route('pharmacy.update', $medicine->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" value="{{ $medicine->name }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Presentación</label>
                <input type="text" name="presentation" value="{{ $medicine->presentation }}" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" value="{{ $medicine->stock }}" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Precio (S/)</label>
                <input type="number" step="0.01" name="price" value="{{ $medicine->price }}" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Laboratorio</label>
                <input type="text" name="laboratory" value="{{ $medicine->laboratory }}" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-warning text-white">
            <i class="fa-solid fa-save"></i> Actualizar
        </button>
    </form>
</div>
@endsection
