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


        // foreach ($games as $game) {
        //     // ad ogni game "attacco" istanze random di platforms
        //     $game->platforms()->attach(
        //         // random prende una o più istanze random dalla collection
        //         // rand dice quante prenderne tra 0 e tutte le istanze
        //         // pluck prende solo gli id dalle istanze
        //         // toArray perché attach vuole un array di id
        //         $platforms->random(rand(0, count($platforms)))->pluck('id')->toArray()
        //     );
        // }

        $games_platforms = [
            ["game_id" => 1, "platform_id" => 1], // Destiny 2 - PC
            ["game_id" => 1, "platform_id" => 2], // Destiny 2 - Xbox
            ["game_id" => 1, "platform_id" => 3], // Destiny 2 - PlayStation

            ["game_id" => 2, "platform_id" => 1], // Doom Eternal - PC
            ["game_id" => 2, "platform_id" => 2], // Doom Eternal - Xbox
            ["game_id" => 2, "platform_id" => 3], // Doom Eternal - PlayStation
            ["game_id" => 2, "platform_id" => 5], // Doom Eternal - Nintendo

            ["game_id" => 3, "platform_id" => 1], // Red Dead Online - PC
            ["game_id" => 3, "platform_id" => 2], // Red Dead Online - Xbox
            ["game_id" => 3, "platform_id" => 3], // Red Dead Online - PlayStation

            ["game_id" => 4, "platform_id" => 1], // Battlefield 4 - PC
            ["game_id" => 4, "platform_id" => 2], // Battlefield 4 - Xbox
            ["game_id" => 4, "platform_id" => 3], // Battlefield 4 - PlayStation

            ["game_id" => 5, "platform_id" => 1], // Battlefield 1 - PC
            ["game_id" => 5, "platform_id" => 2], // Battlefield 1 - Xbox
            ["game_id" => 5, "platform_id" => 3], // Battlefield 1 - PlayStation

            ["game_id" => 6, "platform_id" => 1], // Battlefield V - PC
            ["game_id" => 6, "platform_id" => 2], // Battlefield V - Xbox
            ["game_id" => 6, "platform_id" => 3], // Battlefield V - PlayStation

            ["game_id" => 7, "platform_id" => 1], // Rainbow Six Siege - PC
            ["game_id" => 7, "platform_id" => 2], // Rainbow Six Siege - Xbox
            ["game_id" => 7, "platform_id" => 3], // Rainbow Six Siege - PlayStation

            ["game_id" => 8, "platform_id" => 1], // Broforce - PC
            ["game_id" => 8, "platform_id" => 4], // Broforce - Steamdeck & handheld
            ["game_id" => 8, "platform_id" => 5], // Broforce - Nintendo

            ["game_id" => 9, "platform_id" => 1], // Dragon Ball Xenoverse 2 - PC
            ["game_id" => 9, "platform_id" => 2], // Dragon Ball Xenoverse 2 - Xbox
            ["game_id" => 9, "platform_id" => 3], // Dragon Ball Xenoverse 2 - PlayStation
            ["game_id" => 9, "platform_id" => 5], // Dragon Ball Xenoverse 2 - Nintendo

            ["game_id" => 10, "platform_id" => 1], // Atomic Heart - PC
            ["game_id" => 10, "platform_id" => 2], // Atomic Heart - Xbox
            ["game_id" => 10, "platform_id" => 3], // Atomic Heart - PlayStation

            ["game_id" => 11, "platform_id" => 1], // Ratchet & Clank: Rift Apart - PC
            ["game_id" => 11, "platform_id" => 3], // Ratchet & Clank: Rift Apart - PlayStation

            ["game_id" => 12, "platform_id" => 1], // God of War - PC
            ["game_id" => 12, "platform_id" => 3]  // God of War - PlayStation
        ];

        foreach ($games_platforms as $game_platform) {
            $game = Game::find($game_platform["game_id"]);
            $platform_id = $game_platform["platform_id"];

            // Controllo esistenza gioco e piattaforma
            if ($game && Platform::find($platform_id)) {
                $game->platforms()->attach($platform_id);
            }
        }
    }
}
