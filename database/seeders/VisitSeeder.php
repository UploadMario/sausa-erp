<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;
use App\Models\Patient;
use Faker\Factory as Faker;

class VisitSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_PE');

        $diagnosticos = [
            'Infección Respiratoria Aguda (IRA)',
            'Rinitis alérgica',
            'Lumbalgia',
            'Faringitis aguda',
            'Enfermedad Diarreica Aguda (EDA)',
        ];

        $estados = ['Pendiente', 'En Atención', 'Completada'];

        $pacientes = Patient::all();

        if ($pacientes->isEmpty()) return;

        foreach ($pacientes as $p) {

            Visit::create([
                'patient_id' => $p->id,
                'reason'     => 'Atención médica ambulatoria en el Puesto de Salud de Sausa',
                'diagnosis'  => $faker->randomElement($diagnosticos),
                'status'     => $faker->randomElement($estados),
            ]);
        }
    }
}
