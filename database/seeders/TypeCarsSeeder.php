<?php

namespace Database\Seeders;

use App\Models\TypeCars;
use Illuminate\Database\Seeder;

class TypeCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Sedan', 'Hatchbacks', 'SUVs (Vehículos Utilitarios Deportivos)', 'Pick-ups', 'Coupés', 'Convertibles', 'Minivans', 'Vehículos eléctricos'];
        foreach ($types as $type) {
            TypeCars::insert([
                'type'       => $type,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
