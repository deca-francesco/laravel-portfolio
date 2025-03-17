<?php

namespace Database\Seeders;

// importa il modello
use App\Models\Project;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo il Faker e lo passo alla funzione run
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {

            // creo il nuovo post
            $newProject = new Project();

            // riempio le colonne
            $newProject->name = $faker->sentence(3);
            $newProject->client = $faker->company();
            $newProject->started = $faker->date();
            $newProject->finished = $faker->date();
            // $newProject->description = $faker->text($maxNbChars = 200);
            $newProject->description = $faker->paragraph($nbSentences = 12);

            // salvo il record
            $newProject->save();
        }
    }
}
