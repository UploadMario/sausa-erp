@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-danger mb-3"><i class="fa-solid fa-capsules"></i> Nuevo Medicamento</h2>

    <div class="mb-3">
        <a href="{{ route('pharmacy.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left"></i> Volver al listado
        </a>
    </div>

    <form action="{{ route('pharmacy.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Presentación</label>
                <input type="text" name="presentation" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="0">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Precio (S/)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="0.00">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Laboratorio</label>
                <input type="text" name="laboratory" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-danger">
            <i class="fa-solid fa-save"></i> Guardar
        </button>
    </form>
</div>
@endsection
