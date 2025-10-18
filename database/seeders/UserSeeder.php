<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nombre' => 'Admin',
            'apellido' => 'AppSalon',
            'email' => 'admin@appsalon.test',
            'password' => 'password',
            'telefono' => '3000000000',
            'admin' => true,
            'confirmado' => true,
        ]);

        User::create([
            'nombre' => 'Cliente',
            'apellido' => 'Demo',
            'email' => 'cliente@appsalon.test',
            'password' => 'password',
            'telefono' => '3010000000',
            'admin' => false,
            'confirmado' => true,
        ]);
    }
}
