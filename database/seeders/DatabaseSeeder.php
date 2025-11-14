<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'name'     => 'Administrador',
            'email'    => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);

        // Llamada ordenada a todos los seeders
        $this->call([
            PatientSeeder::class,
            AdmissionSeeder::class,
            VisitSeeder::class,
            EmergencySeeder::class,
            ExtramuralSeeder::class,
            ReferralSeeder::class,
            AltaSeeder::class,
            PharmacySeeder::class,
        ]);
    }
}
