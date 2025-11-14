@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.errors')
    @include('partials.flash')

    <h3 class="fw-bold mb-3">Registrar Admisión</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admission.store') }}" method="POST">
                @csrf

                {{-- Selección de Paciente --}}
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

                {{-- Fecha de ingreso --}}
                @include('partials.form-input', [
                    'label' => 'Fecha de Ingreso',
                    'name' => 'fecha_ingreso',
                    'type' => 'date'
                ])

                {{-- Motivo --}}
                @include('partials.form-textarea', [
                    'label' => 'Motivo de Admisión',
                    'name' => 'motivo'
                ])

                <button type="submit" class="btn btn-primary mt-3">
                    Guardar
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
