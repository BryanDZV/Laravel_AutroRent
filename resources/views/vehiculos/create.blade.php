@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">Crear Vehiculo</div>
        <div class="card-body">
            <form action="{{ route('vehiculos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Matricula</label>
                    <input type="text" name="matricula" class="form-control @error('matricula') is-invalid @enderror"
                        value="{{ old('matricula', $item->matricula ?? '') }}" required>
                    @error('matricula') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror"
                        value="{{ old('marca', $item->marca ?? '') }}" required>
                    @error('marca') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror"
                        value="{{ old('modelo', $item->modelo ?? '') }}" required>
                    @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio por Dia</label>
                    <input type="text" name="precio_dia" class="form-control @error('precio_dia') is-invalid @enderror"
                        value="{{ old('precio_dia', $item->precio_dia ?? '') }}" required>
                    @error('precio_dia') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>



                <div class="mt-4">
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection