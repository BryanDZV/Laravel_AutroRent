<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Tabla users (modifica la migración que trae Laravel por defecto):

     *login (string, único)

     *nombre (string)

     *apellidos (string)

     *dni (string, único)

     *password (string)

     *tipo (enum con los valores: 'administrador', 'empleado')
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni')->unique();
            $table->string('password');
            $table->enum('tipo', ['administrador', 'empleado']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
