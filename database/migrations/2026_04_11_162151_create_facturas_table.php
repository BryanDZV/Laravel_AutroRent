<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla facturas:

     *Clave foránea a la tabla de alquileres (borrado en cascada).

     *fecha_emision (date)

     *importe_total (decimal)
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alquiler_id')->constrained('alquilers')->onDelete('cascade');
            $table->date('fecha_emision');
            $table->decimal('importe_total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
