@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-3">Detalle de Referencia</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>Paciente:</strong> {{ $referral->patient->name }}</p>
            <p><strong>DNI:</strong> {{ $referral->patient->dni }}</p>

            <p><strong>Destino:</strong> {{ $referral->destino }}</p>
            <p><strong>Fecha:</strong> {{ $referral->fecha_referencia }}</p>

            <p><strong>Motivo:</strong></p>
            <p>{{ $referral->motivo }}</p>

            <p><strong>Tipo:</strong> {{ $referral->tipo }}</p>

            <a href="{{ route('referral.index') }}" class="btn btn-secondary mt-3">
                Volver
            </a>

        </div>
    </div>

</div>
@endsection
