@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-3">Detalle de Alta</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>Paciente:</strong> {{ $alta->patient->name }}</p>
            <p><strong>DNI:</strong> {{ $alta->patient->dni }}</p>
            <p><strong>Fecha de Alta:</strong> {{ $alta->fecha_alta }}</p>

            <p><strong>Resumen:</strong></p>
            <p>{{ $alta->resumen }}</p>

            <a href="{{ route('alta.index') }}" class="btn btn-secondary mt-3">
                Volver
            </a>

        </div>
    </div>

</div>
@endsection
