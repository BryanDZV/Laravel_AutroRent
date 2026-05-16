<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlquilerController extends Controller
{
    public function create(Vehiculo $vehiculo)
    {
        $clientes = Cliente::all();
        return view('alquileres.create', compact('vehiculo', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha_inicio' => 'required|date',
            'dias' => 'required|integer|min:1'
        ]);


        // Calcular fecha hay conflicto si fin inicio_existente <= fin_nuevo Y fin_existente >= inicio_nuevo
        $fin = date('Y-m-d', strtotime($request->fecha_inicio . ' +' . ($request->dias - 1) . ' days'));

        // Comprobar conflicto
        $existe = Alquiler::where('vehiculo_id', $request->vehiculo_id)
            ->where('fecha_inicio', '<=', $fin)
            ->whereRaw("DATE_ADD(fecha_inicio, INTERVAL dias DAY) >= ?", [$request->fecha_inicio])
            ->exists();

        if ($existe) {
            return back()->with('error', 'Fechas ocupadas');
        }

        // 1. Crear Alquiler
        $alquiler = Alquiler::create([
            'fecha_inicio' => $request->fecha_inicio,
            'dias' => $request->dias,
            //asi asociamos el alquiler al empleado logueado que lo registra y al cliente que lo solicita
            'empleado_id' => Auth::id(),
            'cliente_id' => $request->cliente_id,
            'vehiculo_id' => $request->vehiculo_id,
        ]);

        // 2. Lógica de Negocio: Calcular Importe
        $vehiculo = Vehiculo::find($request->vehiculo_id);
        $cliente = Cliente::find($request->cliente_id);
        $total = $vehiculo->precio_dia * $request->dias;

        if ($cliente->tipo_cliente === 'vip') {
            $total *= 0.80; // 20% de descuento
        }

        // 3. Crear Factura Automática
        Factura::create([
            'alquiler_id' => $alquiler->id,
            'fecha_emision' => now(),
            'importe_total' => $total
        ]);

        return redirect()->route('vehiculos.index')->with('success', 'Alquiler registrado con éxito.');
    }
}
