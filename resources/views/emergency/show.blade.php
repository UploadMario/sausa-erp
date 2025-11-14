@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-3">Detalle de Emergencia</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>Paciente:</strong> {{ $emergency->patient->name }}</p>
            <p><strong>DNI:</strong> {{ $emergency->patient->dni }}</p>

            <p><strong>Fecha:</strong> {{ $emergency->fecha }}</p>

            <p><strong>Diagnóstico:</strong></p>
            <p>{{ $emergency->diagnostico }}</p>

            <p><strong>Estado:</strong> {{ $emergency->estado }}</p>

            <a href="{{ route('emergency.index') }}" class="btn btn-secondary mt-3">
                Volver
            </a>
        </div>
    </div>

</div>
@endsection
