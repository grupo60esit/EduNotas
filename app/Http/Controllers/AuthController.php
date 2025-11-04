<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



     //Buscamos al uasuri por correo para ver su estado
     $user = User::where('email',$request->email)->first();

      //si no existe el usuario

       if(!$user){
         return back()->withErrors([
            'email' => 'usuario no existe',
        ]);
       }

       //si esta inactivo no lo dejamos entrar

       if($user->estado !== 'activo'){
          return back()->withErrors([
            'email' => 'Tu cuenta está desactivada. Contacta con el administrador.',
        ]);
       }

        // Validar login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Redirigir al home o dashboard
        }

        // Si falla
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

