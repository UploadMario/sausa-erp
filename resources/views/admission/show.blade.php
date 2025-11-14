@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-3">Detalle de Admisión</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>Paciente:</strong> {{ $admission->patient->name }}</p>
            <p><strong>DNI:</strong> {{ $admission->patient->dni }}</p>

            <p><strong>Fecha de Ingreso:</strong> {{ $admission->fecha_ingreso }}</p>
            <p><strong>Motivo:</strong></p>
            <p>{{ $admission->motivo }}</p>

            <a href="{{ route('admission.index') }}" class="btn btn-secondary mt-3">Volver</a>

        </div>
    </div>

</div>
@endsection
