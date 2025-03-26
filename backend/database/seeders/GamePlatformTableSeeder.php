<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamePlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // prendo tutti games e platforms
        $games = Game::all();
        $platforms = Platform::all();


        foreach ($games as $game) {
            // ad ogni game "attacco" istanze random di platforms
            $game->platforms()->attach(
                // random prende una o più istanze random dalla collection
                // rand dice quante prenderne tra 0 e tutte le istanze
                // pluck prende solo gli id dalle istanze
                // toArray perché attach vuole un array di id
                $platforms->random(rand(0, count($platforms)))->pluck('id')->toArray()
            );
        }
    }
}
