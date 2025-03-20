<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// attenzione ad importare il controller api e NON admin
Route::get("projects", [ProjectController::class, "index"]);

Route::get("projects/{project}", [ProjectController::class, "show"]);
