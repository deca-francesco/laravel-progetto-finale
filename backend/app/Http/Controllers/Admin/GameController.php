<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // prendo tutti i giochi e li mostro
        $games = Game::all();
        // dd($games);
        return view("games.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("games.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prendo i dati dalla richiesta
        $data = $request->all();
        // dd($data);

        // creo l'istanza del nuovo gioco
        $newGame = new Game();

        // valorizzo
        $newGame->title = $data["title"];   // data è un array letterale
        $newGame->developer = $data["developer"];
        $newGame->publisher = $data["publisher"];
        $newGame->release_date = $data["release_date"];
        $newGame->price = $data["price"];
        $newGame->rating = $data["rating"];
        $newGame->reviews = $data["reviews"];
        $newGame->description = $data["description"];

        // controllo se esiste l'immagine nell'array dei dati
        // if (array_key_exists("image", $data)) {
        //     // carichiamo l'immagine nello storage nella cartella games (se non esiste la crea), il metodo putFile la rinomina anche in modo univoco a differenza di put()
        //     $img_url = Storage::putFile("games", $data["image"]);

        //     $newGame->image = $img_url;
        // }

        // dd($data);

        // salvo
        $newGame->save();

        // DOPO che ho salvato il game salvo le platforms nella tabella pivot perché ci serve l'id del game appena creato
        // devo scrivere platforms() con le tonde perhé sto ancora costruendo la query. Senza tonde restituisce l'array platforms 
        // controllo per inserire le platforms solo se ne è stata selezionata almeno una
        // if ($request->has("platforms")) {
        //     $newGame->platforms()->attach($data["platforms"]);
        // }

        // reindirizzo alla show del game appena creato
        return redirect()->route("games.show", $newGame);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)    // se prendo direttamente tutto il game non devo fare query di ricerca
    {
        // dd($game);
        return view("games.show", compact("game"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view("games.edit", compact("game"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        // prendo i parametri nella richiesta
        $data = $request->all();

        // modifico il game già esistente
        $game->title = $data["title"];
        $game->developer = $data["developer"];
        $game->publisher = $data["publisher"];
        $game->release_date = $data["release_date"];
        $game->price = $data["price"];
        $game->rating = $data["rating"];
        $game->reviews = $data["reviews"];
        $game->description = $data["description"];

        // dd($data);

        // se esiste una nuova immagine la aggiorno, altrimenti no
        // if (array_key_exists("image", $data)) {
        //     // eliminare vecchia immagine
        //     Storage::delete($game->image);

        //     // caricare la nuova
        //     $img_url = Storage::putFile("games", $data["image"]);

        //     // aggiornare il db
        //     $game->image = $img_url;
        // }

        // aggiorno
        $game->update();

        // // controllo se nella richiesta c'è l'array delle platforms
        // if ($request->has("platforms")) {
        //     // DOPO l'update synco i cambiamenti delle platforms nella tabella pivot
        //     $game->platforms()->sync($data["platforms"]);
        // } else {
        //     // altrimenti elimino le platforms associate al game
        //     $game->platforms()->detach();
        // }

        // reindirizzo al game modificato
        return redirect()->route("games.show", $game);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // // se il game ha un'immagine la elimino
        // if ($game->image) {
        //     Storage::delete($game->image);
        // }

        // // dice errore sulla constrained delle platforms quindi devo prima eliminare le platforms associate
        // if ($game->platforms) {
        //     $game->platforms()->detach();
        // }

        // elimino il game
        $game->delete();

        // reindirizzo alla index
        return redirect()->route("games.index");
    }
}
