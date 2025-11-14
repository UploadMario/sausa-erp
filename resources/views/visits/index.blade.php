@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
    font-family: 'Poppins', sans-serif;
}

/* ==== CONTENEDOR ==== */
.visits-container {
    background: rgba(255,255,255,0.4);
    backdrop-filter: blur(15px);
    border-radius: 25px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    padding: 2rem;
    margin-top: 2rem;
    animation: fadeInUp 0.8s ease;
}
@keyframes fadeInUp {
    from {opacity: 0; transform: translateY(15px);}
    to {opacity: 1; transform: translateY(0);}
}

.visits-header h2 {
    font-weight: 700;
    color: #2e7d32;
}
.visits-header i {
    color: #43a047;
    margin-right: 8px;
}

/* ==== BOTONES ==== */
.btn-fancy {
    border: none;
    border-radius: 12px;
    padding: 0.6rem 1.2rem;
    font-weight: 600;
    color: #fff;
    background: linear-gradient(135deg, #43a047, #2e7d32);
    transition: all 0.3s ease;
}
.btn-fancy:hover {
    transform: translateY(-3px);
    background: linear-gradient(135deg, #66bb6a, #388e3c);
}

/* ==== TABLA ==== */
.table-glass {
    background: rgba(255,255,255,0.6);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.table-glass thead {
    background: linear-gradient(135deg, #66bb6a, #43a047);
    color: #fff;
}
.table-glass tbody tr:hover {
    background-color: rgba(102,187,106,0.1);
    transition: 0.3s;
}
.badge-status {
    border-radius: 10px;
    padding: 0.3rem 0.6rem;
    font-size: 0.8rem;
}

/* ==== BOTÓN FLOTANTE ==== */
.btn-floating {
    position: fixed;
    bottom: 35px;
    right: 35px;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #43a047, #2e7d32);
    color: white;
    font-size: 1.8rem;
    box-shadow: 0 6px 18px rgba(0,0,0,0.3);
    transition: transform 0.3s;
}
.btn-floating:hover {
    transform: scale(1.1);
}
</style>

<div class="container visits-container">
    <div class="visits-header d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa-solid fa-stethoscope"></i> Módulo de Atenciones</h2>
        <a href="{{ route('inicio') }}" class="btn btn-outline-success fw-bold">
            <i class="fa-solid fa-arrow-left"></i> Volver al Panel
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($visits->isEmpty())
        <div class="alert alert-info text-center fw-bold">
            <i class="fa-solid fa-info-circle"></i> No hay atenciones registradas.
        </div>
    @else
        <table class="table table-hover align-middle table-glass">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Paciente</th>
                    <th>Motivo</th>
                    <th>Diagnóstico</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visits as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->patient->name ?? 'N/A' }}</td>
                    <td>{{ $v->reason }}</td>
                    <td>{{ $v->diagnosis }}</td>
                    <td>{{ \Carbon\Carbon::parse($v->created_at)->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $v->status == 'Completada' ? 'success' : 'warning' }}">
                            {{ $v->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('visits.edit', $v->id) }}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('visits.destroy', $v->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar esta atención?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- BOTÓN FLOTANTE PARA NUEVA ATENCIÓN -->
<a href="{{ route('visits.create') }}" class="btn-floating" title="Nueva Atención">
    <i class="fa-solid fa-plus"></i>
</a>
@endsection
