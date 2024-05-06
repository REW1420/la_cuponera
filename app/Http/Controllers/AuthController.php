<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;





class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();




        if ($user) {
            if (password_verify($password, $user->password)) {
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

    public function register_new_client(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'dui' => 'required|unique:clients,dui',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = 2;
        $user->save();

        $client = new Clients();
        $client->user_id = $user->id;
        $client->phone = $request->input('phone');
        $client->dui = $request->input('dui');
        $client->save();

        return view('auth.login');
    }


}

