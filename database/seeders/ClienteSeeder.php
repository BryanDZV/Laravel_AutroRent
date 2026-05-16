<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //clientes especificos

        // Clientes
        Cliente::create([
            'nombre' => 'Pedro',
            'apellidos' => 'García',
            'dni' => '33333333C',
            'telefono' => '600111222',
            'tipo_cliente' => 'estandar',
        ]);

        Cliente::create([
            'nombre' => 'Marta',
            'apellidos' => 'Sánchez',
            'dni' => '44444444D',
            'telefono' => '600333444',
            'tipo_cliente' => 'vip',
        ]);
    }
}
