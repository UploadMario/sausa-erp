<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
# Controladores de la versión anterior
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ReportController;
# Nuevos controladores
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\ExtramuralController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\AltaController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// Todas las rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Página principal
    Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');

    // CRUD de Pacientes
    Route::resource('pacientes', PatientController::class);

    // CRUD de Atenciones
    Route::resource('visits', VisitController::class);

    // Farmacia
    Route::get('pharmacy/stock', [PharmacyController::class, 'stock'])->name('pharmacy.stock');
    Route::resource('pharmacy', MedicineController::class);

    // Reportes
    Route::get('reportes', [ReportController::class, 'index'])->name('reportes.index');

    // Nuevos módulos (Fase 3)
    Route::resource('admission', AdmissionController::class);
    Route::resource('emergency', EmergencyController::class);
    Route::resource('extramural', ExtramuralController::class);
    Route::resource('referral', ReferralController::class);
    Route::resource('alta', AltaController::class);
});
