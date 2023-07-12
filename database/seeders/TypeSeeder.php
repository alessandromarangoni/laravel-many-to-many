<?php

namespace Database\Seeders;
use App\Models\type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 4; $i++) {
            $type = new type();
            $type->name = $faker->sentence(4);
            $type->img = $faker->imageUrl(800, 600, 'job', true);
            $type->save();
        }
    }
}
