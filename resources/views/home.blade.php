@extends('layouts.app')

@section('content')
<style>
body {
    margin: 0;
    padding: 0;
    background: radial-gradient(circle at top right, #e3f2fd, #bbdefb, #90caf9);
    overflow-x: hidden;
    font-family: 'Poppins', sans-serif;
}
#particles-js {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: -1;
}

.dashboard-container {
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.dashboard-header {
    text-align: center;
    margin-bottom: 3rem;
    color: white;
}
.dashboard-header h2 {
    font-weight: 800;
    font-size: 2.5rem;
    text-shadow: 0 0 20px rgba(0,0,0,0.3);
}
.dashboard-header p {
    font-size: 1.1rem;
    opacity: 0.9;
}

/* --- Tarjetas --- */
.module-card {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255,255,255,0.25);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    text-align: center;
    padding: 2rem 1rem;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}
.module-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 12px 40px rgba(0,0,0,0.2);
}
.module-card::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at top left, rgba(255,255,255,0.2), transparent 70%);
    opacity: 0;
    transition: opacity 0.6s ease;
}
.module-card:hover::before {
    opacity: 1;
}

.module-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin-bottom: 1rem;
    font-size: 2.5rem;
    color: #fff;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}
.icon-blue { background: linear-gradient(135deg, #42a5f5, #1565c0); }
.icon-green { background: linear-gradient(135deg, #66bb6a, #2e7d32); }
.icon-red { background: linear-gradient(135deg, #ef5350, #c62828); }
.icon-yellow { background: linear-gradient(135deg, #ffca28, #f57c00); }

.module-card h5 {
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 0.4rem;
}
.module-card p {
    color: #e3f2fd;
    font-size: 0.95rem;
    min-height: 40px;
}
.module-card a.btn {
    margin-top: 0.6rem;
    border-radius: 10px;
    padding: 0.5rem 1.2rem;
    font-weight: 500;
    letter-spacing: 0.4px;
}
.btn-gradient {
    background: linear-gradient(135deg, #42a5f5, #1565c0);
    color: white !important;
    border: none;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #64b5f6, #1976d2);
}
.fade-in {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease forwards;
}
@keyframes fadeInUp {
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div id="particles-js"></div>

<div class="dashboard-container">
    <div class="dashboard-header fade-in" style="animation-delay:0.2s;">
        <h2><i class="fa-solid fa-hospital-user"></i> Panel de Control</h2>
        <p>Bienvenido, <strong>{{ Auth::user()->name }}</strong> 👋 — Tu centro médico inteligente <strong>SausaERP</strong></p>
    </div>

    <div class="container">
        <div class="row g-4 justify-content-center">

            <!-- 1. Pacientes -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:0.3s">
                <div class="module-card" onclick="location.href='{{ route('pacientes.index') }}'">
                    <div class="module-icon icon-blue"><i class="fa-solid fa-user-injured"></i></div>
                    <h5>Pacientes</h5>
                    <p>Gestión de fichas y datos personales.</p>
                    <a href="{{ route('pacientes.index') }}" class="btn btn-gradient btn-sm w-100">Entrar</a>
                </div>
            </div>

            <!-- 2. Atenciones -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:0.4s">
                <div class="module-card" onclick="location.href='{{ route('visits.index') }}'">
                    <div class="module-icon icon-green"><i class="fa-solid fa-stethoscope"></i></div>
                    <h5>Atenciones</h5>
                    <p>Consultas, diagnósticos y tratamientos.</p>
                    <a href="{{ route('visits.index') }}" class="btn btn-gradient btn-sm w-100" style="background:linear-gradient(135deg,#66bb6a,#2e7d32)">Entrar</a>
                </div>
            </div>

            <!-- 3. Farmacia -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:0.5s">
                <div class="module-card" onclick="location.href='{{ route('pharmacy.index') }}'">
                    <div class="module-icon icon-red"><i class="fa-solid fa-pills"></i></div>
                    <h5>Farmacia</h5>
                    <p>Inventario y control de medicamentos.</p>
                    <a href="{{ route('pharmacy.index') }}" class="btn btn-gradient btn-sm w-100" style="background:linear-gradient(135deg,#ef5350,#c62828)">Entrar</a>
                </div>
            </div>

            <!-- 4. Reportes -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:0.6s">
                <div class="module-card" onclick="location.href='{{ route('reportes.index') }}'">
                    <div class="module-icon icon-yellow"><i class="fa-solid fa-chart-line"></i></div>
                    <h5>Reportes</h5>
                    <p>Indicadores y análisis general del sistema.</p>
                    <a href="{{ route('reportes.index') }}" class="btn btn-gradient btn-sm w-100" style="background:linear-gradient(135deg,#ffca28,#f57c00)">Entrar</a>
                </div>
            </div>

            <!-- 5. Admisiones -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:0.7s">
                <div class="module-card" onclick="location.href='{{ route('admission.index') }}'">
                    <div class="module-icon icon-blue"><i class="fa-solid fa-bed-pulse"></i></div>
                    <h5>Admisiones</h5>
                    <p>Registro de ingreso hospitalario y motivos clínicos.</p>
                    <a href="{{ route('admission.index') }}" class="btn btn-gradient btn-sm w-100">Entrar</a>
                </div>
            </div>

            <!-- 6. Emergencias -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:0.8s">
                <div class="module-card" onclick="location.href='{{ route('emergency.index') }}'">
                    <div class="module-icon icon-red"><i class="fa-solid fa-truck-medical"></i></div>
                    <h5>Emergencias</h5>
                    <p>Atención inmediata y registro de incidentes críticos.</p>
                    <a href="{{ route('emergency.index') }}" class="btn btn-gradient btn-sm w-100" 
                       style="background:linear-gradient(135deg,#ef5350,#c62828)">Entrar</a>
                </div>
            </div>

            <!-- 7. Extramurales -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:0.9s">
                <div class="module-card" onclick="location.href='{{ route('extramural.index') }}'">
                    <div class="module-icon icon-green"><i class="fa-solid fa-people-carry-box"></i></div>
                    <h5>Extramurales</h5>
                    <p>Visitas comunitarias y actividades fuera del centro.</p>
                    <a href="{{ route('extramural.index') }}" class="btn btn-gradient btn-sm w-100"
                       style="background:linear-gradient(135deg,#66bb6a,#2e7d32)">Entrar</a>
                </div>
            </div>

            <!-- 8. Referencias -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:1.0s">
                <div class="module-card" onclick="location.href='{{ route('referral.index') }}'">
                    <div class="module-icon icon-yellow"><i class="fa-solid fa-arrow-right-arrow-left"></i></div>
                    <h5>Referencias</h5>
                    <p>Derivaciones a otros servicios o instituciones.</p>
                    <a href="{{ route('referral.index') }}" class="btn btn-gradient btn-sm w-100"
                       style="background:linear-gradient(135deg,#ffca28,#f57c00)">Entrar</a>
                </div>
            </div>

            <!-- 9. Altas -->
            <div class="col-md-3 col-sm-6 fade-in" style="animation-delay:1.1s">
                <div class="module-card" onclick="location.href='{{ route('alta.index') }}'">
                    <div class="module-icon icon-blue"><i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i></div>
                    <h5>Altas</h5>
                    <p>Salida del paciente y cierre del proceso clínico.</p>
                    <a href="{{ route('alta.index') }}" class="btn btn-gradient btn-sm w-100">Entrar</a>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
    "particles": {
        "number": { "value": 100, "density": { "enable": true, "value_area": 800 } },
        "color": { "value": ["#42a5f5", "#81c784", "#ffca28"] },
        "shape": { "type": "circle" },
        "opacity": { "value": 0.4 },
        "size": { "value": 3 },
        "line_linked": { "enable": true, "distance": 150, "color": "#bbdefb", "opacity": 0.3, "width": 1 },
        "move": { "enable": true, "speed": 2, "direction": "none", "out_mode": "out" }
    },
    "interactivity": {
        "events": { "onhover": { "enable": true, "mode": "grab" } },
        "modes": { "grab": { "distance": 150, "line_linked": { "opacity": 0.7 } } }
    },
    "retina_detect": true
});
</script>
@endsection
