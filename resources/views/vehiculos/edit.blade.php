@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning">Editar Vehículo</div>
        <div class="card-body">
            <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
                @csrf @method('PUT')
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">Editar Vehiculo</div>
                    <div class="card-body">
                        <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Matricula</label>
                                <input type="text" name="matricula"
                                    class="form-control @error('matricula') is-invalid @enderror"
                                    value="{{ old('matricula', $vehiculo->matricula ?? '') }}" required>
                                @error('matricula') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Marca</label>
                                <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror"
                                    value="{{ old('marca', $vehiculo->marca ?? '') }}" required>
                                @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelo</label>
                                <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror"
                                    value="{{ old('modelo', $vehiculo->modelo ?? '') }}" required>
                                @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Precio por Dia</label>
                                <input type="text" name="precio_dia"
                                    class="form-control @error('precio_dia') is-invalid @enderror"
                                    value="{{ old('precio_dia', $vehiculo->precio_dia ?? '') }}" required>
                                @error('precio_dia') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>



                            <div class="mt-4">
                                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="mt-4">
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection