<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alta;
use App\Models\Patient;

class AltaSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();

        foreach (range(1, 8) as $i) {
            $p = $patients->random();

            Alta::create([
                'patient_id'    => $p->id,
                'fecha_salida'  => fake()->dateTimeBetween('-1 month', 'now'),
                'motivo'        => fake('es_PE')->sentence(4),
            ]);
        }
    }
}
