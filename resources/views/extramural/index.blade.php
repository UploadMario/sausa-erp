@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.flash')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Actividades Extramurales</h3>
        <a href="{{ route('extramural.create') }}" class="btn btn-primary">Nueva Actividad</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>DNI</th>
                        <th>Fecha</th>
                        <th>Actividad</th>
                        <th>Responsable</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($extramurals as $e)
                    <tr>
                        <td>{{ $e->patient->name }}</td>
                        <td>{{ $e->patient->dni }}</td>
                        <td>{{ $e->fecha }}</td>
                        <td>{{ Str::limit($e->actividad, 50) }}</td>
                        <td>{{ $e->responsable }}</td>

                        <td class="text-end">
                            <a href="{{ route('extramural.show', $e) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('extramural.edit', $e) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('extramural.destroy', $e) }}" method="POST" class="d-inline">
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

            {{ $extramurals->links() }}

        </div>
    </div>

</div>
@endsection
