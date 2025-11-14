@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.errors')
    @include('partials.flash')

    <h3 class="fw-bold mb-3">Editar Actividad Extramural</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('extramural.update', $extramural) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Paciente --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Paciente</label>
                    <select name="patient_id" class="form-select" required>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}"
                                {{ $extramural->patient_id == $p->id ? 'selected' : '' }}>
                                {{ $p->dni }} — {{ $p->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Fecha --}}
                @include('partials.form-input', [
                    'label' => 'Fecha de Actividad',
                    'name' => 'fecha',
                    'type' => 'date',
                    'value' => $extramural->fecha
                ])

                {{-- Actividad --}}
                @include('partials.form-textarea', [
                    'label' => 'Actividad Realizada',
                    'name' => 'actividad',
                    'value' => $extramural->actividad
                ])

                {{-- Responsable --}}
                @include('partials.form-input', [
                    'label' => 'Responsable',
                    'name' => 'responsable',
                    'value' => $extramural->responsable
                ])

                <button type="submit" class="btn btn-primary mt-3">
                    Actualizar
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
