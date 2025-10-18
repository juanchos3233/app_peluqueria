<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AppSalon</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  <div class="nav">
    <a href="/">AppSalon</a>
    <a href="/appointments/create">Agendar Cita</a>
    <a href="/#servicios">Servicios</a>
    @auth
      @if(auth()->user()->isAdmin())
        <a href="/admin">Admin</a>
        <a href="{{ route('admin.services.index') }}">Servicios (Admin)</a>
      @endif
      <span style="flex:1"></span>
      <form action="/logout" method="POST" style="display:inline">
        @csrf
        <button class="btn">Salir</button>
      </form>
      <span class="badge">{{ auth()->user()->nombre }}</span>
    @else
      <span style="flex:1"></span>
      <a href="/login">Iniciar Sesión</a>
      <a href="/register" class="btn">Registrarse</a>
    @endauth
  </div>

  <div class="container">
    @if(session('success'))
      <div class="flash success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="flash error">{{ session('error') }}</div>
    @endif
    @yield('content')
  </div>
</body>
</html>
