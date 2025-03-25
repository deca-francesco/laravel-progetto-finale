<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
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
        // mi costruisco l'array con l'id dei genres
        $genresCollection = Genre::all();
        $genresIdArray = [];

        // riempio l'array
        foreach ($genresCollection as $genre) {
            $genresIdArray[] = $genre->id;
        };

        // prendo a random un id tra il primo e l'ultimo (i genres cancellati non saranno mai presi e quindi funzionerà anche con id mancanti)
        function getRandomGenreId($idArray)
        {
            // prendo l'id con indice random da 0 alla lunghezza dell'array -1
            return $idArray[rand(0, (count($idArray) - 1))];
        }


        // genero 10 giochi con il faker
        for ($i = 0; $i < 10; $i++) {
            $newGame = new Game();

            $newGame->title = $faker->sentence(3);
            $newGame->developer = $faker->company();
            $newGame->publisher = $faker->company();
            $newGame->release_date = $faker->date();
            // creo il genre_id con un random tra il primo e l'ultimo id nell'array dei genres
            $newGame->genre_id = getRandomGenreId($genresIdArray);
            $newGame->price = $faker->randomFloat(2, 0, 100);
            $newGame->rating = $faker->randomFloat(1, 5, 10);
            $newGame->reviews = $faker->randomNumber(6, false);
            $newGame->description = $faker->paragraph(10);

            $newGame->save();
        }
    }
}
