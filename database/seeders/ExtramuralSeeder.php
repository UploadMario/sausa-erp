<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Extramural;
use App\Models\Patient;

class ExtramuralSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();

        $actividades = [
            'Visita domiciliaria',
            'Control prenatal',
            'Vacunación comunitaria',
            'Tamizaje de anemia',
            'Educación en salud',
        ];

        foreach (range(1, 6) as $i) {
            $p = $patients->random();

            Extramural::create([
                'patient_id' => $p->id,
                'nombre_actividad' => fake()->randomElement($actividades),
                'tipo' => fake()->randomElement(['Visita', 'Campaña', 'Seguimiento']),
                'fecha' => fake()->dateTimeBetween('-3 months', 'now'),
                'descripcion' => fake('es_PE')->sentence(5),
            ]);
        }
    }
}
