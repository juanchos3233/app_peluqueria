<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['token'] = Str::random(12);
        $data['confirmado'] = 1; // Para la semana 11 lo dejamos confirmado

        $user = User::create($data);
        Auth::login($user);

        return redirect('/')->with('success','Registro exitoso. ¡Bienvenido!');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $user = User::where('email',$credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('error','Credenciales inválidas')->withInput();
        }
        Auth::login($user);
        return redirect('/')->with('success','Sesión iniciada');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','Sesión cerrada');
    }
}
