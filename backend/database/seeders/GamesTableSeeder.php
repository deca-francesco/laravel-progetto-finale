<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// faker
use Faker\Generator as Faker;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // genero 10 giochi con il faker
        for ($i = 0; $i < 10; $i++) {
            $newGame = new Game();

            $newGame->title = $faker->sentence(3);
            $newGame->developer = $faker->company();
            $newGame->publisher = $faker->company();
            $newGame->release_date = $faker->date();
            $newGame->price = $faker->randomFloat(2, 0, 100);
            $newGame->rating = $faker->randomFloat(1, 5, 10);
            $newGame->reviews = $faker->randomNumber(6, false);
            $newGame->description = $faker->paragraph(10);

            $newGame->save();
        }
    }
}
