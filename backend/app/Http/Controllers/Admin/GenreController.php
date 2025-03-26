<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view("genres.index", compact("genres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("genres.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prendo tutti i dati dalla richiesta
        $data = $request->all();

        // creo l'istanza del nuovo genre
        $newGenre = new Genre();

        // la valorizzo
        $newGenre->name = $data["name"];
        $newGenre->description = $data["description"];

        // salvo
        $newGenre->save();

        return redirect()->route("genres.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view("genres.edit", compact("genre"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        // prendo i parametri nella richiesta
        $data = $request->all();

        // modifico il genre già esistente
        $genre->name = $data["name"];
        $genre->description = $data["description"];

        // aggiorno
        $genre->update();

        // reindirizzo alla index
        return redirect()->route("genres.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        // elimino il genre
        $genre->delete();

        // reindirizzo alla index
        return redirect()->route("genres.index");
    }
}
