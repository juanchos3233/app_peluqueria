<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    public $timestamps = false;  

    protected $fillable = ['nombre','precio','descripcion','duracion','activo'];

    protected $casts = [
        'precio' => 'decimal:2',
        'duracion' => 'integer',
        'activo' => 'boolean'
    ];

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'citasServicios', 'servicioId', 'citaId');
    }
}
