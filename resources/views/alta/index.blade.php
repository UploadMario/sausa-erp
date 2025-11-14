@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.flash')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Altas de Pacientes</h3>
        <a href="{{ route('alta.create') }}" class="btn btn-primary">Nueva Alta</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>DNI</th>
                        <th>Fecha de Alta</th>
                        <th>Resumen</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($altas as $a)
                    <tr>
                        <td>{{ $a->patient->name }}</td>
                        <td>{{ $a->patient->dni }}</td>
                        <td>{{ $a->fecha_alta }}</td>
                        <td>{{ Str::limit($a->resumen, 60) }}</td>

                        <td class="text-end">
                            <a href="{{ route('alta.show', $a) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('alta.edit', $a) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('alta.destroy', $a) }}" method="POST" class="d-inline">
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

            {{ $altas->links() }}

        </div>
    </div>

</div>
@endsection
