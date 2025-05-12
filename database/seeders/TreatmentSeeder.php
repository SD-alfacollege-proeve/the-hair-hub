<?php

namespace Database\Seeders;

use Database\Factories\TreatmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("treatments")->insert([
            [
                "name" => "Haarstylen en wassen",
                "description" => fake()->paragraph,
                "thumbnail" => fake()->image,
                "duration" => fake()->randomFloat(2,0,2),
            ],

             [
                "name" => "Hoofd- en Hoofdhuidmassage",
                "description" => fake()->paragraph,
                "thumbnail" => fake()->image,
                "duration" => fake()->randomFloat(2,0,2),
            ],

             [
                "name" => "Ontspannende Warme Doek Behandeling",
                "description" => fake()->paragraph,
                "thumbnail" => fake()->image,
                "duration" => fake()->randomFloat(2,0,2),
            ],
            [
                "name" => "blonderen",
                "description" => fake()->paragraph,
                "thumbnail" => fake()->image,
                "duration" => fake()->randomFloat(2,0,2),
            ],
            [
                "name" => "Gezichtsbehandeling",
                "description" => fake()->paragraph,
                "thumbnail" => fake()->image,
                "duration" => fake()->randomFloat(2,0,2),
            ],
            [
                 "name" => "Wenkbrauwen Epileren / Verven",
                 "description" => fake()->paragraph,
                 "thumbnail" => fake()->image,
                 "duration" => fake()->randomFloat(2,0,2),
            ]
                        
        ]);
    }
}
