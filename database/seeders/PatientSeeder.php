<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        // Nombres peruanos
        $nombres = [
            'Juan Pérez', 'María López', 'Carlos Sánchez', 'Ana Torres',
            'Luis Ramírez', 'Rosa Vásquez', 'José Gonzales', 'Lucero Huamán',
            'Miguel Rojas', 'Carmen Quispe', 'Diego Ortiz', 'Sofía Valverde',
            'Andrés Palomino', 'Daniela Yupanqui', 'Pedro Huerta', 'Fiorella Campos',
            'Javier Mamani', 'Camila Gutiérrez', 'Renzo Salazar', 'Valeria Morales'
        ];

        // Calles y sectores solo de Sausa – Jauja
        $direcciones = [
            'Jr. Lima – Sausa, Jauja',
            'Jr. Constitución – Sausa, Jauja',
            'Jr. Grau – Sausa, Jauja',
            'Jr. Huallaga – Sausa, Jauja',
            'Jr. Tarma – Sausa, Jauja',
            'Jr. Puno – Sausa, Jauja',
            'Jr. Junín – Sausa, Jauja',
            'Jr. Amazonas – Sausa, Jauja',
            'Jr. Ayacucho – Sausa, Jauja',
            'Jr. San Martín – Sausa, Jauja',
            'Jr. Manco Cápac – Sausa, Jauja',
            'Jr. Dos de Mayo – Sausa, Jauja',
            'Jr. Progreso – Sausa, Jauja',
            'Barrio Vista Alegre – Sausa, Jauja',
            'Sector Puente Sausa – Sausa, Jauja',
            'Zona Centro – Sausa, Jauja',
            'Urbanización La Florida – Sausa, Jauja',
            'Sector La Capilla – Sausa, Jauja',
            'Cerca a la Plaza Principal – Sausa, Jauja'
        ];

        foreach (range(1, 20) as $i) {
            Patient::create([
                'name'     => $nombres[array_rand($nombres)],
                'dni'      => str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'age'      => rand(1, 95),
                'phone'    => '9' . rand(10000000, 99999999), // Número peruano
                'address'  => $direcciones[array_rand($direcciones)]
            ]);
        }
    }
}
