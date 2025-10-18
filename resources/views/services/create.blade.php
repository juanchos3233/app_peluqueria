@extends('layouts.app')

@section('content')
  <h2>Crear Servicio</h2>
  <form method="POST" action="{{ route('admin.services.store') }}">
    @csrf
    <label>Nombre</label>
    <input class="input" type="text" name="nombre" value="{{ old('nombre') }}">
    @error('nombre') <small class="muted">{{ $message }}</small> @enderror

    <label>Precio</label>
    <input class="input" type="number" step="0.01" name="precio" value="{{ old('precio') }}">
    @error('precio') <small class="muted">{{ $message }}</small> @enderror

    <label>Descripción</label>
    <textarea class="input" name="descripcion">{{ old('descripcion') }}</textarea>

    <label>Duración (min)</label>
    <input class="input" type="number" name="duracion" value="{{ old('duracion',60) }}">
    @error('duracion') <small class="muted">{{ $message }}</small> @enderror

    <label><input type="checkbox" name="activo" checked> Activo</label>

    <button class="btn primary">Guardar</button>
  </form>
@endsection
