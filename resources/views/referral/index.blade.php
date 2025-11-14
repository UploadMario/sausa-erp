@extends('layouts.app')

@section('content')
<div class="container">

    @include('partials.flash')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Referencias</h3>
        <a href="{{ route('referral.create') }}" class="btn btn-primary">Nueva Referencia</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>DNI</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($referrals as $r)
                    <tr>
                        <td>{{ $r->patient->name }}</td>
                        <td>{{ $r->patient->dni }}</td>
                        <td>{{ $r->destino }}</td>
                        <td>{{ $r->fecha_referencia }}</td>
                        <td>{{ $r->tipo }}</td>

                        <td class="text-end">
                            <a href="{{ route('referral.show', $r) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('referral.edit', $r) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('referral.destroy', $r) }}" method="POST" class="d-inline">
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

            {{ $referrals->links() }}

        </div>
    </div>

</div>
@endsection
