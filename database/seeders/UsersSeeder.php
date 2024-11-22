<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = Cities::where('city', 'Bogota')->first();
        $role = Roles::where('role', 'Super Administrador')->first();
        
        User::insert([
            'name' => 'David',
            'last_name' => 'Guerrero',
            'address' => 'Cll 65 Sur #73A - 29',
            'neightboardhood' => 'Perdomo',
            'city_id' => $city->id,
            'cellphone' => '3024786575',
            'email' => 'davidguerrero0709@gmail.com',
            'password' => bcrypt('123456789'),
            'role_id' => $role->id,
            'state' => '1'
        ]);
    }
}
