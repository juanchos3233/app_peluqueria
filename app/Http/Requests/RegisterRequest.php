<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre' => ['required','string','max:60'],
            'apellido' => ['required','string','max:60'],
            'email' => ['required','email','max:120'],
            'telefono' => ['nullable','string','max:15'],
            'password' => ['required','min:6','confirmed'],
        ];
    }
}
