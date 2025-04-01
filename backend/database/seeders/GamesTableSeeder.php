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
        // for ($i = 0; $i < 10; $i++) {
        //     $newGame = new Game();

        //     $newGame->title = $faker->sentence(3);
        //     $newGame->developer = $faker->company();
        //     $newGame->publisher = $faker->company();
        //     $newGame->release_date = $faker->date();
        //     // creo il genre_id con un random tra il primo e l'ultimo id nell'array dei genres
        //     $newGame->genre_id = getRandomGenreId($genresIdArray);
        //     $newGame->price = $faker->randomFloat(2, 0, 100);
        //     $newGame->rating = $faker->randomFloat(1, 5, 10);
        //     $newGame->reviews = $faker->randomNumber(6, false);
        //     $newGame->description = $faker->paragraph(10);

        //     $newGame->save();
        // }


        // prendo qualche gioco vero
        $games = [
            [
                "title" => "Destiny 2",
                "developer" => "Bungie",
                "publisher" => "Bungie",
                "release_date" => "2017-09-06",
                "genre_id" => 4, // Sparatutto
                "price" => "0",
                "rating" => 8.0,
                "reviews" => 120000,
                "description" => "Destiny 2 è un gioco d'azione in prima persona che ti porta in un viaggio epico attraverso il sistema solare. Sperimenta una reattività di combattimento fluida, personalizza il tuo Guardiano con equipaggiamento unico e sfrutta potenti abilità elementali per sconfiggere nemici implacabili."
            ],
            [
                "title" => "Doom Eternal",
                "developer" => "id Software",
                "publisher" => "Bethesda Softworks",
                "release_date" => "2020-03-20",
                "genre_id" => 4, // Sparatutto
                "price" => "19.99",
                "rating" => 9.0,
                "reviews" => 105000,
                "description" => "Doom Eternal è uno sparatutto in prima persona sviluppato da id Software e pubblicato da Bethesda Softworks. È il sequel di Doom (2016) e il settimo capitolo principale della serie Doom. Il gioco continua l'enfasi del suo predecessore sul combattimento 'push-forward', incoraggiando il giocatore ad affrontare aggressivamente i nemici per acquisire salute, munizioni e armatura."
            ],
            [
                "title" => "Red Dead Online",
                "developer" => "Rockstar Games",
                "publisher" => "Rockstar Games",
                "release_date" => "2018-11-27",
                "genre_id" => 2, // Avventura
                "price" => "9.99",
                "rating" => 7.5,
                "reviews" => 45000,
                "description" => "Red Dead Online è l'esperienza multiplayer online ambientata nell'enorme mondo aperto di Red Dead Redemption 2. Crea e personalizza il tuo personaggio, esplora il vasto paesaggio, affronta missioni cooperative e competitive, e vivi la vita di un fuorilegge nel selvaggio West."
            ],
            [
                "title" => "Battlefield 4",
                "developer" => "DICE",
                "publisher" => "Electronic Arts",
                "release_date" => "2013-10-29",
                "genre_id" => 4, // Sparatutto
                "price" => "39.99",
                "rating" => 8.0,
                "reviews" => 89000,
                "description" => "Battlefield 4 è uno sparatutto in prima persona che offre un'esperienza di guerra totale. Con ambienti distruttibili, veicoli su larga scala e combattimenti intensi, il gioco offre una campagna coinvolgente e un multiplayer dinamico."
            ],
            [
                "title" => "Battlefield 1",
                "developer" => "DICE",
                "publisher" => "Electronic Arts",
                "release_date" => "2016-10-21",
                "genre_id" => 4, // Sparatutto
                "price" => "19.99",
                "rating" => 9.0,
                "reviews" => 120000,
                "description" => "Battlefield 1 ti porta indietro nella Prima Guerra Mondiale, offrendo un'esperienza di combattimento su vasta scala con armi e veicoli dell'epoca. Partecipa a battaglie storiche, pilota biplani e carri armati, e vivi la guerra come mai prima d'ora."
            ],
            [
                "title" => "Battlefield V",
                "developer" => "DICE",
                "publisher" => "Electronic Arts",
                "release_date" => "2018-11-20",
                "genre_id" => 4, // Sparatutto
                "price" => "49.99",
                "rating" => 7.0,
                "reviews" => 75000,
                "description" => "Battlefield V è un videogioco sparatutto in prima persona sviluppato da DICE e pubblicato da Electronic Arts. Basato sulla Seconda Guerra Mondiale, il gioco offre un'ampia personalizzazione attraverso il nuovo sistema 'Company', dove i giocatori possono creare personaggi con opzioni cosmetiche e armi personalizzate. Include modalità multiplayer innovative come 'Grand Operations' e una campagna per giocatore singolo composta da 'storie di guerra' basate su aspetti meno noti del conflitto."
            ],
            [
                "title" => "Tom Clancy's Rainbow Six® Siege",
                "developer" => "Ubisoft Montreal",
                "publisher" => "Ubisoft",
                "release_date" => "2015-12-01",
                "genre_id" => 4, // Sparatutto
                "price" => "19.99",
                "rating" => 9.0,
                "reviews" => 200000,
                "description" => "Tom Clancy's Rainbow Six Siege è uno sparatutto tattico in prima persona che enfatizza il gioco di squadra, la strategia e la distruzione ambientale. Partecipa a intense sparatorie 5v5, scegli tra una vasta gamma di operatori specializzati e padroneggia l'arte dell'assedio."
            ],
            [
                "title" => "Broforce",
                "developer" => "Free Lives",
                "publisher" => "Devolver Digital",
                "release_date" => "2015-10-15",
                "genre_id" => 1, // Azione
                "price" => "13.99",
                "rating" => 8.0,
                "reviews" => 35000,
                "description" => "Broforce è un platform d'azione in 2D che celebra l'eccesso dei film d'azione degli anni '80 e '90. Controlla una squadra di 'bros' ispirati a icone del cinema d'azione, distruggi tutto sul tuo cammino e salva il mondo dalla minaccia del terrorismo."
            ],
            [
                "title" => "DRAGON BALL XENOVERSE 2",
                "developer" => "Dimps",
                "publisher" => "Bandai Namco Entertainment",
                "release_date" => "2016-10-28",
                "genre_id" => 9, // Picchiaduro
                "price" => "49.99",
                "rating" => 7.0,
                "reviews" => 60000,
                "description" => "DRAGON BALL XENOVERSE 2 offre un'esperienza di gioco di ruolo d'azione ambientata nell'universo di Dragon Ball. Crea il tuo personaggio, partecipa a epiche battaglie, esplora Conton City e interagisci con personaggi iconici della serie."
            ],
            [
                "title" => "Atomic Heart",
                "developer" => "Mundfish",
                "publisher" => "Focus Entertainment",
                "release_date" => "2023-02-21",
                "genre_id" => 3, // GDR
                "price" => "59.99",
                "rating" => 8.0,
                "reviews" => 15000,
                "description" => "Atomic Heart è un gioco di ruolo d'azione in prima persona ambientato in una realtà alternativa dell'Unione Sovietica. Esplora un mondo retro-futuristico infestato da robot impazziti e mutanti mentre sveli i misteri di un mondo distopico."
            ],
            [
                "title" => "Ratchet & Clank: Rift Apart",
                "developer" => "Insomniac Games",
                "publisher" => "Sony Interactive Entertainment",
                "release_date" => "2021-06-11",
                "genre_id" => 2, // Avventura
                "price" => "79.99",
                "rating" => 9.0,
                "reviews" => 8000,
                "description" => "Ratchet & Clank: Rift Apart è un gioco d'azione e avventura, dove viaggerai attraverso dimensioni alternative in un mondo futuristico e colorato. Usa armi creative e sfrutta poteri dimensionali per salvare l'universo."
            ],
            [
                "title" => "God of War",
                "developer" => "Santa Monica Studio",
                "publisher" => "Sony Interactive Entertainment",
                "release_date" => "2018-04-20",
                "genre_id" => 2, // Avventura
                "price" => "49.99",
                "rating" => 9.5,
                "reviews" => 200000,
                "description" => "God of War è un'epica avventura d'azione che segue Kratos e suo figlio Atreus in un viaggio emozionante attraverso il mondo della mitologia norrena. Affronta divinità e mostri leggendari in uno dei giochi più acclamati di sempre."
            ]
        ];

        foreach ($games as $game) {
            $newGame = new Game();

            $newGame->title = $game["title"];
            $newGame->developer = $game["developer"];
            $newGame->publisher = $game["publisher"];
            $newGame->release_date = $game["release_date"];
            $newGame->genre_id = $game["genre_id"];
            $newGame->price = $game["price"];
            $newGame->rating = $game["rating"];
            $newGame->reviews = $game["reviews"];
            $newGame->description = $game["description"];

            $newGame->save();
        }
    }
}
