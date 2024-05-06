<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return view('admin.pages.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create a new category

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            "name" => "required"
        ], [
            "name.required" => "El nombre del rubro es obligatorio."
        ]);


        Categories::create([
            "name" => $request->input("name")
        ]);



        return back()->with('success', "Rubro eliminada");


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
            "name" => "required",
        ]);

        Categories::find($id)->update($request->all());
        return back()->with('success', "Rubro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category_id)
    {
        Categories::destroy($category_id);
        return back()->with('success', "Rubro eliminada");
    }


}
