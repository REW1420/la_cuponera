<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Usuario;



class AuthController extends Controller
{
    public function showClientLoginForm()
    {
        return view('client.login');
    }

    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function showOffererLoginForm()
    {
        return view('offerer.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = Usuario::where('correo', $email)->first();

        if ($user) {
            if (password_verify($password, $user->contrasena)) {
                switch ($user->rol_id):
                    case 1:
                        return redirect('/admin/home');

                    case 3:
                        return redirect('/offerer/home');

                    case 2:
                        return redirect('/home');
                endswitch;
            } else {
                // Contraseña incorrecta, redirecciona de nuevo al formulario de inicio de sesión con un mensaje de error
                return back()->withErrors(['correo' => 'Correo o contraseña incorrectos']);
            }
        } else {
            // Usuario no encontrado, redirecciona de nuevo al formulario de inicio de sesión con un mensaje de error
            return back()->withErrors(['correo' => 'Correo o contraseña incorrectos']);
        }
    }



}

