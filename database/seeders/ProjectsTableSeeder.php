<?php

namespace Database\Seeders;

// importa il modello
use App\Models\Project;
use App\Models\Type;
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
        // mi costruisco l'array con l'id dei types
        $typesCollection = Type::all();
        $typesIdArray = [];

        // riempio l'array
        foreach ($typesCollection as $type) {
            $typesIdArray[] = $type->id;
        };

        // prendo a random un id tra il primo e l'ultimo (i types cancellati non saranno mai presi e quindi funzionerà anche con id mancanti)
        function getRadomTypeId($idArray)
        {
            // prendo l'id anzichè un numero random da 1 alla lunghezza dell'array
            return $idArray[rand(0, (count($idArray) - 1))];
        }

        for ($i = 0; $i < 10; $i++) {

            // creo il nuovo progetto
            $newProject = new Project();

            // riempio le colonne
            $newProject->name = $faker->sentence(3);
            $newProject->client = $faker->company();

            // $newProject->type = $faker->word();  // il vecchio tipo darà errore se eseguiamo il refresh

            // creo l'id con un random tra il primo e l'ultimo id nell'array
            $newProject->type_id = getRadomTypeId($typesIdArray);

            $newProject->started = $faker->date();
            $newProject->finished = $faker->date();
            // $newProject->description = $faker->text($maxNbChars = 200);
            $newProject->description = $faker->paragraph($nbSentences = 12);

            // salvo il record
            $newProject->save();
        }
    }
}
