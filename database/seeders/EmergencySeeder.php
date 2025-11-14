<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emergency;
use App\Models\Patient;

class EmergencySeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();

        foreach (range(1, 8) as $i) {
            $p = $patients->random();

            Emergency::create([
                'patient_id'   => $p->id,
                'fecha'        => fake()->dateTimeBetween('-2 months', 'now'),
                'diagnostico'  => fake('es_PE')->sentence(3),
                'estado'       => fake()->randomElement(['Atendido', 'Pendiente', 'Crítico']),
            ]);
        }
    }
}
