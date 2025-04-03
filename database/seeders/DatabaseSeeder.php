<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // default
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // gli dico di eseguire i miei seed
        // c'è la contrained sul type_id quindi devo prima riempire la tabella indipendente types e poi la projects
        $this->call([
            TypesTableSeeder::class,
            // ProjectsTableSeeder::class,
            TechnologiesTableSeeder::class,
            // ProjectTechnologyTableSeeder::class
        ]);
    }
}
