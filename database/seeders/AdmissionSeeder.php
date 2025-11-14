<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admission;
use App\Models\Patient;
use Faker\Factory as Faker;

class AdmissionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_PE');

        $areas = [
            'Consulta Externa',
            'Emergencia',
            'Hospitalización',
            'Gineco-Obstetricia',
            'Pediatría'
        ];

        $pacientes = Patient::all();

        if ($pacientes->isEmpty()) return;

        foreach ($pacientes as $p) {

            Admission::create([
                'patient_id'      => $p->id,
                'admission_date'  => $faker->dateTimeBetween('-30 days', '-15 days')->format('Y-m-d'),
                'reason'          => $faker->randomElement(['Dolor agudo', 'Fiebre persistente', 'Control de gestante', 'Infección respiratoria']),
                'area'            => $faker->randomElement($areas),
            ]);
        }
    }
}
