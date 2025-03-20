<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view("technologies.index", compact("technologies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("technologies.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prendo tutti i dati dalla richiesta
        $data = $request->all();

        // creo l'istanza del nuovo progetto
        $newTechnology = new Technology();

        // la valorizzo
        $newTechnology->name = $data["name"];  // data è un array letterale
        $newTechnology->color = $data["color"];

        // salvo
        $newTechnology->save();

        return redirect()->route("technologies.index");
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
    public function edit(Technology $technology)
    {
        return view("technologies.edit", compact("technology"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        // prendo i parametri nella richiesta
        $data = $request->all();

        // modifico il progetto già esistente
        $technology->name = $data["name"];
        $technology->color = $data["color"];

        // aggiorno
        $technology->update();

        // reindirizzo alla index
        return redirect()->route("technologies.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route("technologies.index");
    }
}
