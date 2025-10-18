@extends('layouts.app')

@section('content')
  <h2>Dashboard — {{ $today }}</h2>
  @if($citasHoy->isEmpty())
    <div class="card">No hay citas para hoy.</div>
  @else
    @foreach($citasHoy as $c)
      <div class="card">
        <strong>{{ $c->hora }} — {{ $c->user?->nombre }} {{ $c->user?->apellido }}</strong>
        <div>
          @foreach($c->services as $s)
            <span class="badge">{{ $s->nombre }}</span>
          @endforeach
        </div>
        <div>Total: ${{ number_format($c->total,2) }}</div>
        <small class="muted">Estado: {{ $c->estado }}</small>
      </div>
    @endforeach
  @endif
@endsection
