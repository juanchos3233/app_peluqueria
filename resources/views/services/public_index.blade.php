@extends('layouts.app')

@section('content')
  <div class="card">
    <h2>Bienvenido a AppSalon</h2>
    <p>Reserva tus servicios de belleza de forma rápida y segura.</p>
  </div>

  <h3 id="servicios">Servicios</h3>
  <div class="grid">
    @foreach($services as $s)
      <div class="card">
        <h4>{{ $s->nombre }}</h4>
        <p><strong>${{ number_format($s->precio,2) }}</strong></p>
        @if($s->descripcion)
          <p><small class="muted">{{ $s->descripcion }}</small></p>
        @endif
        <span class="badge">{{ $s->duracion }} min</span>
      </div>
    @endforeach
  </div>
@endsection
