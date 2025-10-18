@extends('layouts.app')

@section('content')
  <h2>Iniciar Sesión</h2>
  <form method="POST" action="/login">
    @csrf
    <label>Email</label>
    <input class="input" type="email" name="email" value="{{ old('email') }}">
    @error('email') <small class="muted">{{ $message }}</small> @enderror

    <label>Contraseña</label>
    <input class="input" type="password" name="password">
    @error('password') <small class="muted">{{ $message }}</small> @enderror

    <button class="btn primary">Entrar</button>
  </form>
@endsection
