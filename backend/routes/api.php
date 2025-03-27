<?php

use App\Http\Controllers\Api\GameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');




// rotte API (attenzione ad importare il controller api e NON admin)

// index
Route::get("games", [GameController::class, "index"]);

// show
Route::get("games/{game}", [GameController::class, "show"]);
