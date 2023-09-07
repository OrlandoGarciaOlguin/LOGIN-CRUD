<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especies = ['Carnivoro','Herviboro','Omnivoro','Insectivoro'];

        foreach($especies as $especie){
            DB::table('especies')->insert([
                'tipo' => $especie
            ]);
        }
    }
}
