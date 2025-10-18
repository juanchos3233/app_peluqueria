<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Público
    public function publicIndex()
    {
        $services = Service::where('activo',1)->orderBy('nombre')->get();
        return view('services.public_index', compact('services'));
    }

    // Admin
    public function index()
    {
        $services = Service::orderBy('id','desc')->paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:60'],
            'precio' => ['required','numeric','min:0'],
            'descripcion' => ['nullable','string'],
            'duracion' => ['nullable','integer','min:10'],
            'activo' => ['nullable','boolean']
        ]);
        $data['activo'] = $request->boolean('activo', true);
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success','Servicio creado');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:60'],
            'precio' => ['required','numeric','min:0'],
            'descripcion' => ['nullable','string'],
            'duracion' => ['nullable','integer','min:10'],
            'activo' => ['nullable','boolean']
        ]);
        $data['activo'] = $request->boolean('activo', true);
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success','Servicio actualizado');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success','Servicio eliminado');
    }
}
