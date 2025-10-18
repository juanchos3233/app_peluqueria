<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AppointmentService extends Pivot
{
    protected $table = 'citasServicios';
    protected $fillable = ['citaId','servicioId'];
}
