<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Referral;
use App\Models\Patient;

class ReferralSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();

        $destinos = [
            'Hospital Domingo Olavegoya - Jauja',
            'Hospital Daniel A. Carrión - Huancayo',
            'Clínica San Pablo - Huancayo',
            'Clínica Ortega - Huancayo',
        ];

        foreach (range(1, 6) as $i) {
            $p = $patients->random();

            Referral::create([
                'patient_id' => $p->id,
                'destino' => fake()->randomElement($destinos),
                'fecha' => fake()->dateTimeBetween('-1 month', 'now'),
                'tipo' => fake()->randomElement(['Emergencia', 'Especialidad', 'Referencia externa']),
            ]);
        }
    }
}
