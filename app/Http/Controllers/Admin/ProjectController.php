<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
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
        // adesso devo prendere i types da passare alla select del form
        $types = Type::all();

        // prendo le technologies per le checkbox del form
        $technologies = Technology::all();

        // ritorniamo la view col form di creazione e l'array dei types
        return view("projects.create", compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prendo tutti i dati dalla richiesta
        $data = $request->all();
        dd($data);

        // creo l'istanza del nuovo progetto
        $newProject = new Project();

        // la valorizzo
        $newProject->name = $data["name"];  // data è un array letterale
        $newProject->client = $data["client"];
        $newProject->type_id = $data["type_id"];
        $newProject->started = $data["started"];
        $newProject->finished = $data["finished"];
        $newProject->description = $data["description"];

        // dd($data);

        // salvo
        $newProject->save();

        // DOPO che ho salvato il project salvo le technologies nella tabella pivot perché ci serve l'id del project appena creato
        // devo scrivere technologies() con le tonde perhé sto ancora costruendo la query. Senza tonde restituisce l'array technologies 
        // controllo per inserire le technologies solo se ne è stata selezionata almeno una
        if ($request->has("technologies")) {
            $newProject->technologies()->attach($data["technologies"]);
        }

        // reindirizzo alla show del progetto appena creato
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
        // dd($project->technologies);

        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // prendo tutti i types per la select del form
        $types = Type::all();

        // prendo tutte le technologies per le checkbox del form
        $technologies = Technology::all();

        return view("projects.edit", compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // prendo i parametri nella richiesta
        $data = $request->all();

        // modifico il progetto già esistente
        $project->name = $data["name"];
        $project->client = $data["client"];
        $project->type_id = $data["type_id"];
        $project->started = $data["started"];
        $project->finished = $data["finished"];
        $project->description = $data["description"];

        // aggiorno
        $project->update();

        // controllo se nella richiesta c'è l'array delle technologies
        if ($request->has("technologies")) {
            // DOPO l'update synco i cambiamenti delle technologies nella tabella pivot
            $project->technologies()->sync($data["technologies"]);
        } else {
            // altrimenti elimino le technologies associate al project
            $project->technologies()->detach();
        }

        // reindirizzo al progetto modificato
        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // elimino il progetto
        $project->delete();

        // reindirizzo alla index
        return redirect()->route("projects.index");
    }
}
