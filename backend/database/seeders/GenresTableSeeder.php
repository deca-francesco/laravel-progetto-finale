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
        // $genres = [
        //     "Azione",
        //     "Avventura",
        //     "GDR",
        //     "Sparatutto",
        //     "Strategia",
        //     "Simulazione",
        //     "Sportivo",
        //     "Corse",
        //     "Picchiaduro",
        //     "Horror"
        // ];

        $genres = [
            ["name" => "Azione", "description" => "Giochi caratterizzati da ritmi frenetici, combattimenti e reazioni veloci."],
            ["name" => "Avventura", "description" => "Esperienze di gioco basate sull'esplorazione, la narrazione e la risoluzione di enigmi."],
            ["name" => "GDR", "description" => "Giochi di ruolo dove i giocatori sviluppano personaggi e vivono avventure epiche."],
            ["name" => "Sparatutto", "description" => "Giochi in cui il combattimento armato e la precisione sono centrali."],
            ["name" => "Strategia", "description" => "Giochi in cui pianificazione e tattica sono fondamentali per vincere."],
            ["name" => "Simulazione", "description" => "Esperienze di gioco che riproducono situazioni della vita reale."],
            ["name" => "Sportivo", "description" => "Giochi che simulano eventi sportivi e attività competitive."],
            ["name" => "Corse", "description" => "Giochi focalizzati sulla velocità e la competizione automobilistica."],
            ["name" => "Picchiaduro", "description" => "Giochi di combattimento uno contro uno, spesso con combo e mosse speciali."],
            ["name" => "Horror", "description" => "Giochi che puntano a suscitare tensione e paura nel giocatore."]
        ];

        foreach ($genres as $genre) {
            $newGenre = new Genre();

            // $newGenre->name = $genre;
            // $newGenre->description = $faker->paragraph(3);

            $newGenre->name = $genre["name"];
            $newGenre->description = $genre["description"];

            $newGenre->save();
        }
    }
}
