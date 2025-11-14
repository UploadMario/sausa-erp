@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-warning"><i class="fa-solid fa-user-pen"></i> Editar Paciente</h2>

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" name="name" value="{{ $paciente->name }}" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">DNI</label>
                <input type="text" name="dni" value="{{ $paciente->dni }}" class="form-control" maxlength="8" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Edad</label>
                <input type="number" name="age" value="{{ $paciente->age }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="phone" value="{{ $paciente->phone }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" name="address" value="{{ $paciente->address }}" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-warning text-white"><i class="fa-solid fa-save"></i> Actualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
