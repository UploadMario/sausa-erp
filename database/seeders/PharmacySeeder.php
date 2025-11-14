<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;

class PharmacySeeder extends Seeder
{
    public function run(): void
    {
        $meds = [
            ['category'=>'Analgesico','name'=>'Paracetamol','price'=>1.50,'stock'=>120],
            ['category'=>'Antiinflamatorio','name'=>'Ibuprofeno','price'=>2.20,'stock'=>80],
            ['category'=>'Antibiotico','name'=>'Amoxicilina','price'=>3.00,'stock'=>60],
            ['category'=>'Antialergico','name'=>'Loratadina','price'=>1.80,'stock'=>90],
            ['category'=>'Gastroprotector','name'=>'Omeprazol','price'=>2.00,'stock'=>70],
            ['category'=>'Antidiabetico','name'=>'Metformina','price'=>1.70,'stock'=>110],
            ['category'=>'Suplemento','name'=>'Vitamina C','price'=>1.20,'stock'=>150],
        ];

        foreach ($meds as $m) {
            Medicine::create($m);
        }
    }
}
