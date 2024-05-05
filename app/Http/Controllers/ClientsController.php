<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Coupons;
use App\Models\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::all();

        $user_ids = $clients->pluck('user_id')->unique()->toArray();
        $user_info = User::whereIn('id', $user_ids)->get();
        $coupons = Coupons::all();

        $data = [
            'clients' => $clients,
            'user_info' => $user_info,
            'coupons' => $coupons,
        ];
        return view('admin.pages.client', compact('data'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
