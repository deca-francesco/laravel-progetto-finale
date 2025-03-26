<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platforms = Platform::all();
        return view("platforms.index", compact("platforms"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("platforms.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prendo tutti i dati dalla richiesta
        $data = $request->all();

        // creo l'istanza della nuova platform
        $newPlatform = new Platform();

        // la valorizzo
        $newPlatform->name = $data["name"];
        $newPlatform->color = $data["color"];

        // salvo
        $newPlatform->save();

        return redirect()->route("platforms.index");
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
    public function edit(Platform $platform)
    {
        return view("platforms.edit", compact("platform"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Platform $platform)
    {
        // prendo i parametri nella richiesta
        $data = $request->all();

        // modifico la platform già esistente
        $platform->name = $data["name"];
        $platform->color = $data["color"];

        // aggiorno
        $platform->update();

        // reindirizzo alla index
        return redirect()->route("platforms.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platform $platform)
    {
        $platform->delete();
        return redirect()->route("platforms.index");
    }
}
