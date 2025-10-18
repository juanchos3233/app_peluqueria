@extends('layouts.app')

@section('content')
  <h2>Registro</h2>
  <form method="POST" action="/register">
    @csrf
    <label>Nombre</label>
    <input class="input" type="text" name="nombre" value="{{ old('nombre') }}">
    @error('nombre') <small class="muted">{{ $message }}</small> @enderror

    <label>Apellido</label>
    <input class="input" type="text" name="apellido" value="{{ old('apellido') }}">
    @error('apellido') <small class="muted">{{ $message }}</small> @enderror

    <label>Email</label>
    <input class="input" type="email" name="email" value="{{ old('email') }}">
    @error('email') <small class="muted">{{ $message }}</small> @enderror

    <label>Teléfono</label>
    <input class="input" type="text" name="telefono" value="{{ old('telefono') }}">
    @error('telefono') <small class="muted">{{ $message }}</small> @enderror

    <label>Contraseña</label>
    <input class="input" type="password" name="password">
    @error('password') <small class="muted">{{ $message }}</small> @enderror

    <label>Confirmar Contraseña</label>
    <input class="input" type="password" name="password_confirmation">

    <button class="btn primary">Crear cuenta</button>
  </form>
@endsection
