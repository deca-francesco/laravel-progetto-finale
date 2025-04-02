<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        // prendo i games dal db in ordine alfabetico e gli dico anche di prendere l'intero genre associato ad ogni game (query con with e nome della relazione nel modello Game)
        $games = Game::with("genre")->orderBy('title', 'asc')->get();

        return response()->json(
            [
                "success" => true,
                "count" => count($games),
                "data" => $games
            ]
        );
    }


    public function show(Game $game)
    {
        // qua abbiamo già un'istanza dal db, non stiamo costruendo una query. Usiamo il metodo load per prendere le relazioni con i loro nomi
        $game->load("genre", "platforms");

        return response()->json(
            [
                "success" => true,
                "data" => $game
            ]
        );
    }
}
