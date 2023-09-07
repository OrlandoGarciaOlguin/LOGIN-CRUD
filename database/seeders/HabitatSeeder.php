<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $habitats = ['Selva','Oceano','Desierto','Bosque','Sabana','Tundra','Pantano','Arrecife','Pradera','Montaña'];

        foreach($habitats as $habitat){
            DB::table('habitats')->insert([
                'tipo' => $habitat
            ]);
        }

    }
}
