<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // prendo i projects dal db e gli dico anche di prendere l'intero type associato ad ogni project (query con with e nome della relazione nel modello Project)
        $projects = Project::with("type")->orderBy('started', 'asc')->get();
        // $projects = Project::all();
        // dd($projects);

        return response()->json(
            [
                "success" => true,
                "count" => count($projects),
                "data" => $projects
            ]
        );
    }


    public function show(Project $project)
    {
        // qua abbiamo già un'istanza dal db. metodo load per avere le relazioni 
        $project->load("type", "technologies");
        // dd($project);

        return response()->json(
            [
                "success" => true,
                "data" => $project
            ]
        );
    }
}
