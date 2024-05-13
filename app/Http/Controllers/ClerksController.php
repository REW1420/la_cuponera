<?php

namespace App\Http\Controllers;

use App\Mail\Send_crendentialsMailable;
use App\Models\Clerks;
use App\Models\Offerer_companies;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ClerksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $company = Offerer_companies::where('email', $user->email)->first();
        $company_id = $company->id;
        $clerks = DB::table('users as u')
            ->join('clerks as c', 'u.id', '=', 'c.user_id')
            ->join('offerer_companies as oc', 'c.company_id', '=', 'oc.id')
            ->select('u.*', 'oc.email AS adminEmail')
            ->where('oc.id', '=', $company_id)
            ->get();

        return view('offerer.clerk', compact('clerks', 'company_id'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
        ], [

            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe tener más de :max caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'La dirección de correo electrónico ya ha sido registrada.',
            'email.max' => 'El campo correo electrónico no debe tener más de :max caracteres.',
        ]);




        $secure_pass = $this->generate_random_password();
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $secure_pass;
        $user->role_id = 3;
        $user->save();
        $key = new Clerks();

        $key->user_id = $user->id;
        $key->company_id = $request->input('company_id');

        $key->save();


        $this->send_credentials($user->email, $secure_pass);
        return back()->with(['success' => 'Usuario creado']);
    }

    private function send_credentials($to, string $password)
    {
        try {
            Mail::to($to)->send(new Send_crendentialsMailable($password, $to));
        } catch (\Exception $e) {
            error_log($e);
            return false;
        }
    }
    private function generate_random_password()
    {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de texto.',
            'name.max' => 'El campo nombre no debe tener más de :max caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'La dirección de correo electrónico ya ha sido registrada.',
            'email.max' => 'El campo correo electrónico no debe tener más de :max caracteres.',
        ]);

        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        return back()->with(['success' => 'Usuario actualizado correctamente']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clerk = Clerks::select(['id'])->where('user_id', $id)->get();
        Clerks::destroy($clerk);
        User::destroy($id);
        return back()->with(['success' => 'Usuario eliminado']);

    }
}
