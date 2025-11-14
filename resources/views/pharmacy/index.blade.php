@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-danger mb-0"><i class="fa-solid fa-pills"></i> Farmacia</h2>

        <div>
            <a href="{{ route('inicio') }}" class="btn btn-outline-secondary me-2">
                <i class="fa-solid fa-arrow-left"></i> Volver al Panel
            </a>
            <a href="{{ route('pharmacy.create') }}" class="btn btn-danger">
                <i class="fa-solid fa-plus"></i> Nuevo Medicamento
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($medicines->isEmpty())
        <div class="alert alert-info mt-3">No hay medicamentos registrados.</div>
    @else
        <div class="card shadow-sm border-0 mt-3">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-danger">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Presentación</th>
                            <th>Stock</th>
                            <th>Precio (S/)</th>
                            <th>Laboratorio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicines as $m)
                        <tr>
                            <td>{{ $m->id }}</td>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->presentation }}</td>
                            <td>{{ $m->stock }}</td>
                            <td>{{ number_format($m->price, 2) }}</td>
                            <td>{{ $m->laboratory }}</td>
                            <td>
                                <a href="{{ route('pharmacy.edit', $m->id) }}" class="btn btn-sm btn-outline-info" title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('pharmacy.destroy', $m->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar este medicamento?')" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
