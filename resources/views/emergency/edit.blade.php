@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.errors')
    @include('partials.flash')

    <h3 class="fw-bold mb-3">Editar Emergencia</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('emergency.update', $emergency) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Paciente --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Paciente</label>
                    <select name="patient_id" class="form-select" required>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}"
                                {{ $emergency->patient_id == $p->id ? 'selected' : '' }}>
                                {{ $p->dni }} — {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Fecha --}}
                @include('partials.form-input', [
                    'label' => 'Fecha de Emergencia',
                    'name' => 'fecha',
                    'type' => 'date',
                    'value' => $emergency->fecha
                ])

                {{-- Diagnóstico --}}
                @include('partials.form-textarea', [
                    'label' => 'Diagnóstico',
                    'name' => 'diagnostico',
                    'value' => $emergency->diagnostico
                ])

                {{-- Estado --}}
                @include('partials.form-input', [
                    'label' => 'Estado',
                    'name' => 'estado',
                    'value' => $emergency->estado
                ])

                <button type="submit" class="btn btn-primary mt-3">
                    Actualizar
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
