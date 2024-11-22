<?php

namespace Database\Seeders;

use App\Models\Positions;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 5 ; $i++) { 
            for ($j=1; $j <= 10 ; $j++) { 
                Positions::insert([
                    'floor'      => $i,
                    'position'   => $j,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
