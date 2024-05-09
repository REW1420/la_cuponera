<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Rejected_reasons;
use Illuminate\Http\Request;

class Rejected_reasons_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {

            $validatedData = $request->validate([
                'id' => 'required|exists:offers,id',
                'reason' => 'required|string|max:255',
            ]);

            $id = $validatedData['id'];


            $reason = new Rejected_reasons();
            $reason->offer_id = $id;
            $reason->reason = $validatedData['reason'];
            $reason->save();


            $offer = Offers::find($id);
            if ($offer) {
                $offer->status_id = 3;
                $offer->save();
            } else {

                return back()->with('error', "La oferta no se encontró");
            }

            return back()->with('success', "Datos enviados correctamente");
        } catch (\Exception $e) {

            return back()->with('error', "Error al procesar la solicitud: " . $e->getMessage());
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
