<?php

use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// 1. Público con el controlador de Login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
// 2. Solo usuarios autenticados (Cualquier rol)
Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', [LoginController::class, 'index'])->name('inicio');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // El listado de vehículos lo ven ambos
    Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');

    // Rutas para Alquileres (Solo para empleados)

    Route::get('/alquiler/nuevo/{vehiculo}', [AlquilerController::class, 'create'])->name('alquileres.create');
    Route::post('/alquiler', [AlquilerController::class, 'store'])->name('alquileres.store');
});
// 3. SOLO ADMINISTRADORES (Usando nuestro nuevo middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    // Aquí van las rutas de creación, edición y borrado
    Route::resource('vehiculos', VehiculoController::class)->except(['index', 'show']);
    // Otras rutas de administración...
});
