<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ['Bogota', 'Medellin', 'Pereira', 'Manizales', 'Cali', 'Bucaramanga'];
        $country = Countries::where('country', 'Colombia')->first();

        foreach ($cities as $city) {
            Cities::insert([
                'city'       => $city,
                'country_id' => $country->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
