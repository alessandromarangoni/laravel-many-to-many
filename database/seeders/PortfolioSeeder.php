<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\portfolio;
use Faker\Generator as Faker;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $project = new portfolio();
            $project->title = $faker->sentence(3);
            $project->content = $faker->text(500);
            $project->image = 'uploads/placeholder.jpg';
            $project->type_id=$faker->numberBetween(1, 4);
            $project->save();
        }
    }
}
