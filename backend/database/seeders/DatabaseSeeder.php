<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                // prima devi creare i genres (tabella indipendente), altrimenti avrai errore quando riempi il genre_id in games perché la constrained controlla che ci sia un id corrispondente in genres
                GenresTableSeeder::class,
                GamesTableSeeder::class,    // poi la tabella dipendente
                PlatformsTableSeeder::class, // questa è indifferente
                GamePlatformTableSeeder::class  // questa dopo i seeder per games e platforms
            ]
        );
    }
}
