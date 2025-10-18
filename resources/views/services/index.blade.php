@extends('layouts.app')

@section('content')
  <div style="display:flex; justify-content:space-between; align-items:center">
    <h2>Servicios (Admin)</h2>
    <a class="btn primary" href="{{ route('admin.services.create') }}">Nuevo Servicio</a>
  </div>

  <table class="table">
    <thead>
      <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Activo</th><th></th></tr>
    </thead>
    <tbody>
      @foreach($services as $s)
        <tr>
          <td>{{ $s->id }}</td>
          <td>{{ $s->nombre }}</td>
          <td>${{ number_format($s->precio,2) }}</td>
          <td>{{ $s->activo ? 'Sí':'No' }}</td>
          <td>
            <a class="btn" href="{{ route('admin.services.edit',$s) }}">Editar</a>
            <form method="POST" action="{{ route('admin.services.destroy',$s) }}" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $services->links() }}

@endsection
