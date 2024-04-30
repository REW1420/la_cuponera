<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;





class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }



    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();



        if ($user) {
            if ($password == $user->password) {
                switch ($user->role_id):
                    case 1:
                        return redirect('/admin/home');
                    case 2:
                        return redirect('/home');
                    case 3:
                        return redirect('/clerk/home');
                    case 4:
                        return redirect('/offerer/home');
                endswitch;
            } else {

                return back()->withErrors(['correo' => 'Correo o contraseña incorrectos']);
            }


        } else {

            return back()->withErrors(['correo' => 'Correo o contraseña incorrectos']);
        }
    }



}

