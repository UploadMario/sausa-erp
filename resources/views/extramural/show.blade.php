@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-3">Detalle de Actividad Extramural</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>Paciente:</strong> {{ $extramural->patient->name }}</p>
            <p><strong>DNI:</strong> {{ $extramural->patient->dni }}</p>

            <p><strong>Fecha:</strong> {{ $extramural->fecha }}</p>

            <p><strong>Actividad Realizada:</strong></p>
            <p>{{ $extramural->actividad }}</p>

            <p><strong>Responsable:</strong> {{ $extramural->responsable }}</p>

            <a href="{{ route('extramural.index') }}" class="btn btn-secondary mt-3">
                Volver
            </a>
        </div>
    </div>

</div>
@endsection
