@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.errors')
    @include('partials.flash')

    <h3 class="fw-bold mb-3">Registrar Referencia</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('referral.store') }}" method="POST">
                @csrf

                {{-- Paciente --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Paciente</label>
                    <select name="patient_id" class="form-select" required>
                        <option value="">Seleccione un paciente</option>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->dni }} — {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Destino --}}
                @include('partials.form-input', [
                    'label' => 'Destino',
                    'name' => 'destino'
                ])

                {{-- Fecha --}}
                @include('partials.form-input', [
                    'label' => 'Fecha de Referencia',
                    'name' => 'fecha_referencia',
                    'type' => 'date'
                ])

                {{-- Motivo --}}
                @include('partials.form-textarea', [
                    'label' => 'Motivo',
                    'name' => 'motivo'
                ])

                {{-- Tipo --}}
                @include('partials.form-input', [
                    'label' => 'Tipo (Referencia / Contrarreferencia)',
                    'name' => 'tipo'
                ])

                <button type="submit" class="btn btn-primary mt-3">
                    Guardar
                </button>
            </form>

        </div>
    </div>

</div>
@endsection
