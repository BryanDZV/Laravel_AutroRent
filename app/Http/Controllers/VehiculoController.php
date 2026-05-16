<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mostar todos los vehiculos
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //te manda a la vista para crear un nuevo vehiculo
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //recibe los datos del formulario y los guarda en la base de datos
        //validar los datos
        $validated = $request->validate([
            'matricula' => ['required', 'unique:vehiculos,matricula'],
            'marca' => ['required'],
            'modelo' => ['required'],
            'precio_dia' => ['required', 'numeric']
        ]);

        //crear el nuevo vehiculo
        Vehiculo::create($validated);

        //redireccionar a la lista de vehiculos
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //aqui se muetrs el detallede un vehiculo, pero no lo vamos a usar en esta practica
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {

        //recibe el vehiculo a editar y te manda a la vista para editarlo
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    //tiene dos argumentos, el request con los datos del formulario y el vehiculo que se va a actualizar
    {
        //validamos los datos
        $validated = $request->validate([
            'matricula' => ['required', Rule::unique('vehiculos')->ignore($vehiculo->id)],
            //la matricula es unica, pero se ignora el vehiculo actual para que no de error si no se cambia
            'marca' => ['required'],
            'modelo' => ['required'],
            'precio_dia' => ['required', 'numeric']
        ]);

        //actualizamos el vehiculo
        $vehiculo->update($validated);
        //redireccionamos a la lista de vehiculos
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //borramos el vehiculo
        $vehiculo->delete();
        //redireccionamos a la lista de vehiculos
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado exitosamente.');
    }
}
