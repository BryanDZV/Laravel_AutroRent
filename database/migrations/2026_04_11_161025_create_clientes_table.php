<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Run the migrations.
     *Tabla clientes:

     *nombre (string)

     *apellidos (string)

     *dni (string, único)

     *telefono (string)

     *tipo_cliente (enum con los valores: 'estandar', 'vip')**/
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni')->unique();
            $table->string('telefono');
            $table->enum('tipo_cliente', ['estandar', 'vip']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
