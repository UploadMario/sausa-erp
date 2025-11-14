@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(135deg, #e3f2fd, #fdfefe);
    font-family: 'Poppins', sans-serif;
}
.report-card {
    border-radius: 16px;
    padding: 1.5rem;
    color: #fff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}
.report-card:hover {
    transform: translateY(-5px);
}
.bg-blue { background: linear-gradient(135deg, #42a5f5, #1565c0); }
.bg-green { background: linear-gradient(135deg, #66bb6a, #2e7d32); }
.bg-red { background: linear-gradient(135deg, #ef5350, #c62828); }
.bg-yellow { background: linear-gradient(135deg, #ffca28, #f57c00); }
.table thead {
    background-color: #1565c0;
    color: #fff;
}
.btn-back {
    background: linear-gradient(135deg, #42a5f5, #1565c0);
    color: white;
    border-radius: 8px;
    text-decoration: none;
}
.btn-back:hover {
    background: linear-gradient(135deg, #64b5f6, #1976d2);
}
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary"><i class="fa-solid fa-chart-line"></i> Reportes e Indicadores</h2>
        <a href="{{ route('inicio') }}" class="btn btn-back"><i class="fa-solid fa-arrow-left"></i> Volver al Panel</a>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="report-card bg-blue text-center">
                <h4><i class="fa-solid fa-user-injured"></i></h4>
                <h3>{{ $totalPatients }}</h3>
                <p>Pacientes Registrados</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-card bg-green text-center">
                <h4><i class="fa-solid fa-stethoscope"></i></h4>
                <h3>{{ $totalVisits }}</h3>
                <p>Atenciones Realizadas</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-card bg-yellow text-center">
                <h4><i class="fa-solid fa-pills"></i></h4>
                <h3>{{ $totalMedicines }}</h3>
                <p>Medicamentos Registrados</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-card bg-red text-center">
                <h4><i class="fa-solid fa-box-open"></i></h4>
                <h3>{{ $lowStock }}</h3>
                <p>Medicamentos con Bajo Stock</p>
            </div>
        </div>
    </div>

    <h5 class="fw-bold text-secondary"><i class="fa-solid fa-clock"></i> Pacientes Recientes</h5>
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Registrado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentPatients as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->dni }}</td>
                <td>{{ $p->age }}</td>
                <td>{{ $p->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
