<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //vehiculo especifico

        // Vehículos
        Vehiculo::create([
            'matricula' => '1234BBB',
            'marca' => 'Seat',
            'modelo' => 'Ibiza',
            'precio_dia' => 45.50,
        ]);

        Vehiculo::create([
            'matricula' => '5678CCC',
            'marca' => 'Toyota',
            'modelo' => 'RAV4',
            'precio_dia' => 80.00,
        ]);

        Vehiculo::create([
            'matricula' => '9012DDD',
            'marca' => 'Tesla',
            'modelo' => 'Model 3',
            'precio_dia' => 120.00,
        ]);
    }
}
