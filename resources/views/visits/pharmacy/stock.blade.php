@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-danger"><i class="fa-solid fa-pills"></i> Farmacia</h2>
    <p class="text-muted">Gestión del inventario y control de medicamentos.</p>

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="fw-bold text-danger">Inventario</h5>
                <a href="#" class="btn btn-danger"><i class="fa-solid fa-plus"></i> Nuevo Medicamento</a>
            </div>

            <table class="table table-hover align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Paracetamol 500mg</td>
                        <td>120</td>
                        <td>S/ 2.50</td>
                        <td>
                            <button class="btn btn-outline-info btn-sm"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
