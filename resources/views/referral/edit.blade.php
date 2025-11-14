@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.errors')
    @include('partials.flash')

    <h3 class="fw-bold mb-3">Editar Referencia</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('referral.update', $referral) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Paciente --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Paciente</label>
                    <select name="patient_id" class="form-select" required>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}"
                                {{ $referral->patient_id == $p->id ? 'selected' : '' }}>
                                {{ $p->dni }} — {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Destino --}}
                @include('partials.form-input', [
                    'label' => 'Destino',
                    'name' => 'destino',
                    'value' => $referral->destino
                ])

                {{-- Fecha --}}
                @include('partials.form-input', [
                    'label' => 'Fecha de Referencia',
                    'name' => 'fecha_referencia',
                    'type' => 'date',
                    'value' => $referral->fecha_referencia
                ])

                {{-- Motivo --}}
                @include('partials.form-textarea', [
                    'label' => 'Motivo',
                    'name' => 'motivo',
                    'value' => $referral->motivo
                ])

                {{-- Tipo --}}
                @include('partials.form-input', [
                    'label' => 'Tipo (Referencia / Contrarreferencia)',
                    'name' => 'tipo',
                    'value' => $referral->tipo
                ])

                <button type="submit" class="btn btn-primary mt-3">
                    Actualizar
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
