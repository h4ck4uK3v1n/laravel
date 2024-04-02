<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request) {
        $user = new User();

        $user->nombre = $request->input('Nombre');
        $user->apellido_p = $request->input('Apellido_p');
        $user->apellido_m = $request->input('Apellido_m');
        $user->usuario = $request->input('Usuario');
        $user->contrasena = bcrypt($request->input('Contrasena'));
        $user->tipodeusuario = $request->input('Tipodeusuario');
        $user->save();

        Auth::login($user);
        return redirect(route('Administrador.index'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function login(Request $request) {
        $credentials = [
            'Usuario' => $request->input('usuario'),
            'password' => $request->input('password')
        ];
    
        $remember = $request->has('remember') ? true : false;
    
        // Personaliza la autenticación
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('Administrador'));
        } else {
            return redirect('login');
        }
    }    
}

