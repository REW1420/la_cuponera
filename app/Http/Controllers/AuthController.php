<?php
namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

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
    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    public function login(Request $request)
    {


        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();




        if ($user) {
            if (password_verify($password, $user->password)) {

                Auth::login($user);

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


    public function send_reset_password_email(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => '¡Correo enviado!'])
            : back()->withErrors(['email' => '¡Upss! Correo no registrado']);
    }

    public function reset_password_form(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);


        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}

