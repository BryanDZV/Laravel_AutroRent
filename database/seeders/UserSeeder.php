<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //usuarios especificos

        // Usuarios
        User::create([
            'login' => 'admin',
            'nombre' => 'Ana',
            'apellidos' => 'Administradora',
            'dni' => '11111111A',
            'password' => Hash::make('1234'),
            'tipo' => 'administrador',
        ]);

        User::create([
            'login' => 'empleado1',
            'nombre' => 'Juan',
            'apellidos' => 'Empleado',
            'dni' => '22222222B',
            'password' => Hash::make('1234'),
            'tipo' => 'empleado',
        ]);

        // User::factory(5)->create();
    }
}
