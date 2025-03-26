<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $platforms = [
            "PC",
            "Xbox",
            "PlayStation",
            "Steamdeck & handheld",
            "Nintendo",
            "Mobile"
        ];

        foreach ($platforms as $platform) {
            $newPlatform = new Platform();

            $newPlatform->name = $platform;
            $newPlatform->color = $faker->hexColor();

            $newPlatform->save();
        }
    }
}
