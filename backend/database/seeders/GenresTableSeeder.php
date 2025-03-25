<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $genres = [
            "Azione",
            "Avventura",
            "GDR",
            "Sparatutto",
            "Strategia",
            "Simulazione",
            "Sportivo",
            "Corse",
            "Picchiaduro",
            "Horror"
        ];

        foreach ($genres as $genre) {
            $newGenre = new Genre();

            $newGenre->name = $genre;
            $newGenre->description = $faker->paragraph(3);

            $newGenre->save();
        }
    }
}
