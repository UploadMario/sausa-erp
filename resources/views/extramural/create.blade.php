@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.errors')
    @include('partials.flash')

    <h3 class="fw-bold mb-3">Registrar Actividad Extramural</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('extramural.store') }}" method="POST">
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

                {{-- Fecha --}}
                @include('partials.form-input', [
                    'label' => 'Fecha de Actividad',
                    'name' => 'fecha',
                    'type' => 'date'
                ])

                {{-- Actividad realizada --}}
                @include('partials.form-textarea', [
                    'label' => 'Actividad Realizada',
                    'name' => 'actividad'
                ])

                {{-- Responsable --}}
                @include('partials.form-input', [
                    'label' => 'Responsable',
                    'name' => 'responsable'
                ])

                <button type="submit" class="btn btn-primary mt-3">
                    Guardar
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
