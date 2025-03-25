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
                // prima devi creare i genres, altrimenti avrai errore quando riempi il genre_id in games
                GenresTableSeeder::class,
                GamesTableSeeder::class
            ]
        );
    }
}
