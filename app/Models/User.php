<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre','apellido','email','password','telefono','admin','confirmado','token'
    ];

    protected $hidden = [
        'password','remember_token',
    ];

    protected $casts = [
        'admin' => 'boolean',
        'confirmado' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function isAdmin(): bool
    {
        return (bool)($this->admin ?? false);
    }
}
