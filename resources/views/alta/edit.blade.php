@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.errors')
    @include('partials.flash')

    <h3 class="fw-bold mb-3">Editar Alta de Paciente</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('alta.update', $alta) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Paciente --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Paciente</label>
                    <select name="patient_id" class="form-select" required>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}" 
                                {{ $alta->patient_id == $p->id ? 'selected' : '' }}>
                                {{ $p->dni }} — {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Fecha de Alta --}}
                @include('partials.form-input', [
                    'label' => 'Fecha de Alta',
                    'name' => 'fecha_alta',
                    'type' => 'date',
                    'value' => $alta->fecha_alta
                ])

                {{-- Resumen --}}
                @include('partials.form-textarea', [
                    'label' => 'Resumen del Caso',
                    'name' => 'resumen',
                    'value' => $alta->resumen
                ])

                <button type="submit" class="btn btn-primary mt-3">
                    Actualizar
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
