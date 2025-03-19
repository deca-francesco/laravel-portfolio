<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = [
            "E-commerce",
            "Blog personali",
            "Portali aziendali",
            "Social network",
            "Portfolio personali",
            "Siti di informazione e news",
            "Applicazioni per servizi di food delivery",
            "Piattaforme di streaming video",
            "Siti di recensioni e valutazioni",
            "Piattaforme di prenotazione viaggi"
        ];

        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->description = $faker->sentence();

            $newType->save();
        }
    }
}
