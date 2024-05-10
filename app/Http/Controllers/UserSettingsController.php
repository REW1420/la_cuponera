<?php

namespace App\Http\Controllers;



use Illuminate\Validation\Rule;

use App\Models\Clients;
use App\Models\Offerer_companies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{
    public function show_setting_form()
    {
        $user = Auth::user();

        if ($user->role_id === 2) {
            $client = Clients::where('user_id', $user->id)->first();

            return view('auth.client-settings', ['user' => $user, 'client' => $client]);
        } else {
            return view('auth.system-settings', ['user' => $user]);
        }
    }

    public function update_system_user(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $messages = [
            'email.unique' => 'Este correo electrónico ya está registrado.',
        ];
        $emailValidationRule = 'required|unique:users,email';
        $emailValidationRule .= ',' . $user->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => $emailValidationRule,
        ], $messages);

        if ($user->role_id === 4) {

            $offerer_company = Offerer_companies::where('email', $request->input('email'));
            if ($offerer_company) {

                $offerer_company->name = $request->input('email');
                $offerer_company->contact_name = $request->input('name');
                $offerer_company->save();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();

                return redirect()->back()->with('success', 'Datos actualizados');
            }
            return redirect()->back()->withErrors('Error en la petición');
        } else {

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return redirect()->back()->with('success', 'Datos actualizados');
        }
    }

    function update_system_password(Request $request)
    {
        $messages = [
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'password.regex' => 'La contraseña debe contener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula, un número y un carácter especial.',
        ];

        $request->validate([
            'password' => ['required', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
        ], $messages);
        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        Auth::logout();
        return redirect('/')->with('success', 'Contraseña cambiada correctamente, por favor inicia sesión nuevamente');
    }


    function show_setting_password_form()
    {
        $user = Auth::user();
        return view("auth.update-system-password", ['user' => $user]);
    }






    function update_system_client(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $messages = [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'address.required' => 'La dirección es obligatoria',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.regex' => 'El número de teléfono debe tener 8 dígitos sin código de área.',
            'dui.required' => 'El campo DUI es obligatorio.',
            'dui.unique' => 'Este DUI ya está registrado.',
            'dui.regex' => 'El DUI debe contener 9 números sin guiones.',
        ];

        $validationRules = [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => ['required', 'regex:/^[0-9]{8}$/'],
            'address' => 'required',
            'dui' => ['required', 'regex:/^[0-9]{9}$/'],
        ];

        $request->validate($validationRules, $messages);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();


        $client = Clients::where('user_id', $userId)->first();
        $client->phone = $request->input('phone');
        if ($client->dui !== $request->input('dui')) {
            $client->dui = $request->input('dui');
        }
        $client->address = $request->input('address');
        $client->save();
        return redirect()->back()->with('success', 'Datos actualizados');
    }




}
