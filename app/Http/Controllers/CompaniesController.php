<?php

namespace App\Http\Controllers;

use App\Mail\Send_crendentialsMailable;
use App\Models\User;
use Illuminate\Support\Str;

use App\Models\Categories;
use App\Models\Offerer_companies;
use Illuminate\Http\Request;

use App\Mail\Cuido2022;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        $companies = Offerer_companies::all();

        return view('admin.pages.companies', compact('categories', 'companies'));
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

    private function create_code($company_name): string
    {
        $company_name = str_replace(' ', '', $company_name);
        $company_name = str_shuffle($company_name);
        $code = Str::upper(substr($company_name, 0, 3));
        $code .= $this->get_random_int() . $this->get_random_int() . $this->get_random_int();
        return $code;

    }

    private function get_random_int()
    {
        return mt_rand(0, 9);
    }


    private function generate_random_password()
    {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
    }



    public function store(Request $request)
    {
        $temp_password = $this->generate_random_password();
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'contact_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'category_id' => 'required|integer',
            'commission' => 'required|numeric',

        ]);



        $company = new Offerer_companies();
        $company->name = $request->input('name');
        $company->code = $this->create_code($request->input('name'));
        $company->address = $request->input('address');
        $company->contact_name = $request->input('contact_name');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->category_id = $request->input('category_id');
        $company->commission = $request->input('commission');

        $offerer = new User();
        $offerer->name = $request->input('contact_name');
        $offerer->email = $request->input('email');
        $offerer->password = $temp_password;
        $offerer->role_id = 4; //Offerer role id is 4

        $company->save();
        $offerer->save();


        if ($this->send_credentials($request->input('email'), $temp_password, $request->input('email'))) {
            return back()->with('success', '¡Empresa creada exitosamente!');
        } else {
            return back()->with('error', '¡Error al enviar el correo electrónico!');
        }

    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'contact_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'category_id' => 'required|integer',
            'commission' => 'required|numeric',
        ]);


        $company = Offerer_companies::find($id);
        $offerer = User::where('email', $company->email)->where('role_id', 4)->first();

        $offerer->update(['email' => $request->email]);
        $company->update($request->all());


        return back()->with('success', "Empresa actualizada");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $company = Offerer_companies::find($id);


        if ($company) {
            $company->delete();


            $offerer = User::where('email', $company->email)->where('role_id', 4)->first();


            if ($offerer) {

                $offerer->delete();
            }


            return back()->with('success', '¡Empresa y usuario eliminados exitosamente!');
        } else {

            return back()->with('error', '¡No se pudo encontrar la empresa!');
        }
    }

    private function send_credentials($to, string $password, string $email)
    {
        try {
            Mail::to($to)->send(new Send_crendentialsMailable($password, $email));
        } catch (\Exception $e) {
            error_log($e);
            return false;
        }
    }
}

