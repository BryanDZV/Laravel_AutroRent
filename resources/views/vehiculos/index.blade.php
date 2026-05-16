@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Vehiculos</h2>
        <a href="{{ route('vehiculos.create') }}" class="btn btn-sm btn-success">Crear Vehículo</a>
    </div>


    <div class="table-responsive shadow-sm">
        <table class="table table-striped table-hover bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Matricula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio por Día</th>
                    <th ">Aciones</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehiculos as $vehiculo)
                                                <tr>
                                                    <td>{{ $vehiculo->matricula }}</td>
                                                    <td>{{ $vehiculo->marca }}</td>
                                                    <td>{{ $vehiculo->modelo }}</td>
                                                    <td>{{ $vehiculo->precio_dia }}</td>
                                                    <td>
                                                        {{-- Lógica según el rol del usuario --}}
                                                        @if(Auth::user()->tipo === 'empleado')
                                                                                                <a href=" {{ route('alquileres.create', $vehiculo) }}"
                                                            class="btn btn-sm btn-primary">
                                                            Registrar
                                                            Alquiler</a>
                                                        @elseif(Auth::user()->tipo === 'administrador')
                                        <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">
                                                Eliminar
                                            </button>


                                        </form>

                                    @endif
                                    </td>
                                    {{--
                                <td class="text-end">
                                    <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Borrar?')">Borrar</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                </tbody>
        </table>
        <a class="btn btn-sm btn-primary" href="{{ route('inicio') }}">Volver al Inicio</a>
    </div>
@endsection