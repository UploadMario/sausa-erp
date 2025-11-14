@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(135deg, #e3f2fd, #fdfefe);
    font-family: 'Poppins', sans-serif;
}
.form-card {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    padding: 2.5rem;
    max-width: 700px;
    margin: 2rem auto;
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease;
}
.form-card:hover {
    transform: translateY(-5px);
}
h2 {
    color: #1565c0;
    font-weight: 700;
    text-align: center;
    margin-bottom: 1.5rem;
}
label {
    font-weight: 600;
    color: #0d47a1;
}
.btn-gradient {
    background: linear-gradient(135deg, #42a5f5, #1565c0);
    color: #fff;
    border: none;
    border-radius: 10px;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #64b5f6, #1976d2);
    transform: scale(1.03);
}
.back-btn {
    background: linear-gradient(135deg, #9e9e9e, #616161);
    color: white;
    border: none;
}
.back-btn:hover {
    background: linear-gradient(135deg, #bdbdbd, #424242);
}
</style>

<div class="container">
    <div class="form-card">
        <h2><i class="fa-solid fa-stethoscope"></i> Registrar Atención</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('visits.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="patient_id">Paciente</label>
                <select name="patient_id" id="patient_id" class="form-select" required>
                    <option value="">-- Seleccione un paciente --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }} ({{ $patient->dni }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="reason">Motivo de la atención</label>
                <input type="text" name="reason" id="reason" class="form-control" placeholder="Ej: Dolor de cabeza intenso" required>
            </div>

            <div class="mb-3">
                <label for="diagnosis">Diagnóstico</label>
                <textarea name="diagnosis" id="diagnosis" class="form-control" rows="3" placeholder="Ej: Migraña tensional"></textarea>
            </div>

            <div class="mb-3">
                <label for="status">Estado</label>
                <select name="status" id="status" class="form-select">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Finalizada">Finalizada</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('visits.index') }}" class="btn back-btn">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-gradient px-4">
                    <i class="fa-solid fa-check"></i> Guardar Atención
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
