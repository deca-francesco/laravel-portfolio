<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// le mie rotte

// rotte backoffice admin
Route::middleware(["auth", "verified"])
    ->name("admin.")
    ->prefix("admin")
    ->group(function () {

        Route::get("/", [DashboardController::class, "index"])
            ->name("index");

        Route::get("/profile", [DashboardController::class, "profile"])
            ->name("profile");
    });


// rotte del controller resource ProjectController (crea già le rotte per le CRUD)
Route::resource("projects", ProjectController::class)
    ->middleware(["auth", "verified"]);


// rotte del controller resource TypeController
Route::resource("types", TypeController::class)
    ->middleware(["auth", "verified"]);



require __DIR__ . '/auth.php';
