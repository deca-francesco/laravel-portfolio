<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // prendo tutte le istanze tramite il modello
        $projects = Project::all();
        // li passo alla view sottoforma di array
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ritorniamo la view col form di creazione
        return view("projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prendo tutti i dati dalla richiesta
        $data = $request->all();

        // creo l'istanza del nuovo progetto
        $newProject = new Project();

        // la valorizzo
        $newProject->name = $data["name"];  // data è un array letterale
        $newProject->client = $data["client"];
        $newProject->started = $data["started"];
        $newProject->finished = $data["finished"];
        $newProject->description = $data["description"];

        // salvo
        $newProject->save();

        // reindirizzo alla show del progetto appena creato
        // return view("projects.show", $newProject);
        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show(Project $project)  // se prendo direttamente tutto il post non devo fare query di ricerca
    {
        // id è tutto ciò che abbiamo dopo lo slash
        // prendo il project tramite id
        // $project = Project::where("id", $id)->first();
        // $project = Project::find($id);
        // dd($project);

        return view("projects.show", compact("project"));
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
