@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.flash')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Admisiones</h3>
        <a href="{{ route('admission.create') }}" class="btn btn-primary">Nueva Admisión</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>DNI</th>
                        <th>Fecha de Ingreso</th>
                        <th>Motivo</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admissions as $a)
                    <tr>
                        <td>{{ $a->patient->name }}</td>
                        <td>{{ $a->patient->dni }}</td>
                        <td>{{ $a->fecha_ingreso }}</td>
                        <td>{{ Str::limit($a->motivo, 50) }}</td>
                        <td class="text-end">
                            <a href="{{ route('admission.show', $a) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('admission.edit', $a) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admission.destroy', $a) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar registro?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $admissions->links() }}

        </div>
    </div>
</div>
@endsection
