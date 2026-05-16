<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla alquileres:

     *fecha_inicio (date)

     *dias (integer)

     *Clave foránea a la tabla de usuarios, llamando al campo empleado_id (borrado en cascada).

     *Clave foránea a la tabla de clientes (borrado en cascada).

     *Clave foránea a la tabla de vehículos (borrado en cascada).
     */
    public function up(): void
    {
        Schema::create('alquilers', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->integer('dias');
            $table->foreignId('empleado_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquilers');
    }
};
