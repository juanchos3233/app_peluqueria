<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();
        $citasHoy = Appointment::with(['user','services'])->where('fecha',$today)->orderBy('hora')->get();
        return view('admin.dashboard', compact('citasHoy','today'));
    }
}
