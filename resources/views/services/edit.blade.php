@extends('layouts.app')

@section('content')
  <h2>Editar Servicio</h2>
  <form method="POST" action="{{ route('admin.services.update',$service) }}">
    @csrf @method('PUT')
    <label>Nombre</label>
    <input class="input" type="text" name="nombre" value="{{ old('nombre',$service->nombre) }}">

    <label>Precio</label>
    <input class="input" type="number" step="0.01" name="precio" value="{{ old('precio',$service->precio) }}">

    <label>Descripción</label>
    <textarea class="input" name="descripcion">{{ old('descripcion',$service->descripcion) }}</textarea>

    <label>Duración (min)</label>
    <input class="input" type="number" name="duracion" value="{{ old('duracion',$service->duracion) }}">

    <label><input type="checkbox" name="activo" {{ $service->activo ? 'checked':'' }}> Activo</label>

    <button class="btn primary">Actualizar</button>
  </form>
@endsection
