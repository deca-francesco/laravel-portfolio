<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view("types.index", compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("types.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prendo tutti i dati dalla richiesta
        $data = $request->all();

        // creo l'istanza del nuovo progetto
        $newType = new Type();

        // la valorizzo
        $newType->name = $data["name"];  // data è un array letterale
        $newType->description = $data["description"];

        // salvo
        $newType->save();

        return redirect()->route("types.index");
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
    public function edit(Type $type)
    {
        return view("types.edit", compact("type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        // prendo i parametri nella richiesta
        $data = $request->all();

        // modifico il progetto già esistente
        $type->name = $data["name"];
        $type->description = $data["description"];

        // aggiorno
        $type->update();

        // reindirizzo alla index
        return redirect()->route("types.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        // elimino il tipo
        $type->delete();

        // reindirizzo alla index
        return redirect()->route("types.index");
    }
}
