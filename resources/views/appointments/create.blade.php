@extends('layouts.app')

@section('content')
  <h2>Agendar Cita</h2>
  @guest
    <div class="flash">Debes iniciar sesión para crear una cita.</div>
  @endguest
  <form method="POST" action="/appointments">
    @csrf
    <label>Fecha</label>
    <input class="input" type="date" name="fecha" value="{{ old('fecha') }}">
    @error('fecha') <small class="muted">{{ $message }}</small> @enderror

    <label>Hora</label>
    <input class="input" type="time" name="hora" value="{{ old('hora') }}">
    @error('hora') <small class="muted">{{ $message }}</small> @enderror

    <label>Servicios</label>
    <select class="input" name="servicios[]" multiple size="6">
      @foreach($services as $s)
        <option value="{{ $s->id }}">{{ $s->nombre }} — ${{ number_format($s->precio,2) }}</option>
      @endforeach
    </select>
    @error('servicios') <small class="muted">{{ $message }}</small> @enderror

    <button class="btn primary">Reservar</button>
  </form>
@endsection
