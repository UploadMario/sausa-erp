@extends('layouts.app')

@section('content')
<style>
body {
    background: radial-gradient(circle at bottom right, #e3f2fd, #bbdefb, #90caf9);
    font-family: 'Poppins', sans-serif;
}
#particles-js {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: -1;
}
.container {
    position: relative;
    z-index: 10;
}
.table-glass {
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
thead tr {
    background: linear-gradient(135deg,#42a5f5,#1565c0);
    color: white;
}
tbody tr:hover {
    background-color: rgba(33,150,243,0.1);
    transition: all 0.3s;
}
.btn-primary, .btn-outline-info, .btn-outline-danger {
    border-radius: 10px;
    transition: all 0.3s ease;
}
.btn-primary:hover {
    transform: scale(1.05);
}
.btn-floating {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: linear-gradient(135deg,#1565c0,#42a5f5);
    color: white;
    border-radius: 50%;
    width: 60px; height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
}
.btn-floating:hover {
    transform: rotate(15deg) scale(1.1);
    background: linear-gradient(135deg,#42a5f5,#64b5f6);
}
</style>

<div id="particles-js"></div>

<div class="container py-5">
    <h2 class="fw-bold text-primary mb-4"><i class="fa-solid fa-user-injured"></i> Gestión de Pacientes</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-plus"></i> Nuevo Paciente
        </a>
    </div>

    @if($patients->isEmpty())
        <div class="alert alert-info text-center mt-4 p-4 shadow-lg">
            <i class="fa-solid fa-circle-info"></i> No hay pacientes registrados aún.
        </div>
    @else
        <div class="table-responsive shadow-lg">
            <table class="table table-hover align-middle table-glass">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Edad</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->dni }}</td>
                        <td>{{ $p->age }}</td>
                        <td>{{ $p->phone }}</td>
                        <td>{{ $p->address }}</td>
                        <td>
                            <a href="{{ route('pacientes.edit', $p->id) }}" class="btn btn-sm btn-outline-info">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('pacientes.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar este paciente?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- 🔙 Botón para volver al panel principal -->
<a href="{{ route('inicio') }}" class="btn-floating" title="Volver al panel principal">
    <i class="fa-solid fa-house"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
    "particles": {
        "number": { "value": 70, "density": { "enable": true, "value_area": 800 } },
        "color": { "value": ["#42a5f5", "#81c784", "#29b6f6"] },
        "shape": { "type": "circle" },
        "opacity": { "value": 0.5 },
        "size": { "value": 3 },
        "line_linked": { "enable": true, "distance": 120, "color": "#90caf9", "opacity": 0.3, "width": 1 },
        "move": { "enable": true, "speed": 2, "out_mode": "out" }
    },
    "interactivity": {
        "events": { "onhover": { "enable": true, "mode": "repulse" } },
        "modes": { "repulse": { "distance": 120 } }
    },
    "retina_detect": true
});
</script>
@endsection
