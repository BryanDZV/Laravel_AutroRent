@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">Crear Alquiler</div>
        <div class="card-body">
            <form action="{{ route('alquileres.store') }}" method="POST">
                @csrf
                <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">
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
                    <label class="form-label">Precio/Dia</label>
                    <input type="text" name="precio_dia" class="form-control @error('precio_dia') is-invalid @enderror"
                        value="{{ old('precio_dia', $vehiculo->precio_dia ?? '') }}" required>
                    @error('precio_dia') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Clientes</label>
                    <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror">
                        <option value="">Selecciona opcion</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('cliente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <label>Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" required>

                <label>Días:</label>
                <input type="number" name="dias" min="1" required>

                <button type="submit">Generar Alquiler y Factura</button>

                <div class="mt-4">
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
        </select>
        @error('campo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

@endsection