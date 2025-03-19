<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // importo project e technologies
        $projects = Project::all();
        $technologiesCollection = Technology::all();

        // mi costruisco l'array con l'id delle technologies
        // $technologiesIdArray = [];

        // riempio l'array
        // foreach ($technologiesCollection as $technology) {
        //     $technologiesIdArray[] = $technology->id;
        // };


        foreach ($projects as $project) {

            $project->technologies()->attach(
                // for($i = 0; $i < rand(0, 3); $i++) {
                //     $technologiesIdArray[rand(0, (count($idArray) - 1))];
                // }

                // random prende una o più istanze random dalla collection
                // rand dice quante prenderne
                // pluck prende solo gli id dalle istanze
                // toArray perché attach vuole un array di id
                $technologiesCollection->random(rand(0, 3))->pluck('id')->toArray()
            );
        }
    }
}
