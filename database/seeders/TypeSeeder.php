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
        $types= ['website statico','website vetrina','web application','mobile application','other..'];
        foreach ($types as $typename) {
            $type = new type();
            $type->name = $typename;
            $type->img = $faker->imageUrl(800, 600, 'job', true);
            $type->save();
        }
    }
}
