@extends('layouts.app')

@section('content')
<style>
body {
    background: radial-gradient(circle at bottom right, #e3f2fd, #bbdefb, #90caf9);
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
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
.card-glass {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(18px);
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    padding: 2rem;
    color: #0d47a1;
}
.card-glass h3 {
    font-weight: 700;
    text-align: center;
    color: #1565c0;
}
.form-control {
    border-radius: 10px;
    border: none;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.form-control:focus {
    box-shadow: 0 0 10px rgba(21,101,192,0.5);
}
.btn-gradient {
    background: linear-gradient(135deg, #42a5f5, #1565c0);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 10px 18px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #64b5f6, #1976d2);
    transform: scale(1.05);
}
.btn-cancel {
    background: linear-gradient(135deg, #ef5350, #c62828);
    color: white;
}
.btn-cancel:hover {
    background: linear-gradient(135deg, #e57373, #d32f2f);
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
    <div class="col-md-8 mx-auto">
        <div class="card-glass">
            <h3><i class="fa-solid fa-user-plus"></i> Registrar Nuevo Paciente</h3>
            <hr>

            <form action="{{ route('pacientes.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                        <input type="text" class="form-control" name="name" placeholder="Ej. Juan Pérez" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dni" class="form-label fw-semibold">DNI</label>
                        <input type="text" class="form-control" name="dni" placeholder="Ej. 12345678" maxlength="8" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="age" class="form-label fw-semibold">Edad</label>
                        <input type="number" class="form-control" name="age" placeholder="Ej. 35">
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label fw-semibold">Teléfono</label>
                        <input type="text" class="form-control" name="phone" placeholder="Ej. 987654321">
                    </div>
                    <div class="col-md-4">
                        <label for="address" class="form-label fw-semibold">Dirección</label>
                        <input type="text" class="form-control" name="address" placeholder="Ej. Av. Los Olivos 123">
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-gradient me-2">
                        <i class="fa-solid fa-save"></i> Guardar
                    </button>
                    <a href="{{ route('pacientes.index') }}" class="btn btn-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Botón flotante para volver al panel principal -->
<a href="{{ route('inicio') }}" class="btn-floating" title="Volver al Panel Principal">
    <i class="fa-solid fa-house"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
    "particles": {
        "number": { "value": 60 },
        "color": { "value": ["#42a5f5", "#81c784", "#29b6f6"] },
        "shape": { "type": "circle" },
        "opacity": { "value": 0.6 },
        "size": { "value": 3 },
        "line_linked": { "enable": true, "distance": 130, "color": "#90caf9", "opacity": 0.4, "width": 1 },
        "move": { "enable": true, "speed": 2 }
    },
    "interactivity": {
        "events": { "onhover": { "enable": true, "mode": "repulse" } },
        "modes": { "repulse": { "distance": 120 } }
    },
    "retina_detect": true
});
</script>
@endsection
