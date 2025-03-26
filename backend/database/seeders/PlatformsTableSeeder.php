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
        // $platforms = [
        //     "PC",
        //     "Xbox",
        //     "PlayStation",
        //     "Steamdeck & handheld",
        //     "Nintendo",
        //     "Mobile"
        // ];

        $platforms = [
            ["name" => "PC", "color" => "#0078F0"],
            ["name" => "Xbox", "color" => "#107C10"],
            ["name" => "PlayStation", "color" => "#003791"],
            ["name" => "Steamdeck & handheld", "color" => "#171A21"],
            ["name" => "Nintendo", "color" => "#E60012"],
            ["name" => "Mobile", "color" => "#34C759"]
        ];

        foreach ($platforms as $platform) {
            $newPlatform = new Platform();

            $newPlatform->name = $platform["name"];
            // $newPlatform->color = $faker->hexColor();
            $newPlatform->color = $platform["color"];

            $newPlatform->save();
        }
    }
}
