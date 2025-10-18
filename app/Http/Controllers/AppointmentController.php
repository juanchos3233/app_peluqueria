<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function create()
    {
        $services = Service::where('activo',1)->orderBy('nombre')->get();
        return view('appointments.create', compact('services'));
    }

    public function store(AppointmentRequest $request)
    {
        $user = Auth::user();
        if (!$user) { return redirect('/login'); }

        $data = $request->validated();
        $appt = Appointment::create([
            'fecha' => $data['fecha'],
            'hora'  => $data['hora'],
            'usuarioId' => $user->id,
            'total' => 0,
            'estado' => 'pendiente',
        ]);
        $appt->services()->sync($data['servicios']);

        // Calcular total simple
        $total = $appt->services()->sum('precio');
        $appt->update(['total'=>$total]);

        return redirect('/')->with('success','Cita creada. Total: $'.number_format($total,2));
    }
}
