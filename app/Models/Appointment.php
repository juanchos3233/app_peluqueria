<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'citas';
    public $timestamps = false; 

    protected $fillable = ['fecha','hora','usuarioId','total','estado'];

    protected $casts = [
        'fecha' => 'date',
        'hora' => 'datetime:H:i',
        'total' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuarioId');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'citasServicios', 'citaId', 'servicioId');
    }
}
