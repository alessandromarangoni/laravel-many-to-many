<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $technologies=['html','css','pure js','vue js','pure php','laravel'];

        foreach ($technologies as $tech) {

            $technology = new Tecnology();

            $technology->name =$tech;
            $technology->save();
        }
    }
}
