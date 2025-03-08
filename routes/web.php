<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\SkinController;

Route::middleware('auth')->group(function () {
    Route::resource('personajes', PersonajeController::class);
    Route::resource('skins', SkinController::class);
});
Route::get('personajes/{personaje}/edit', [PersonajeController::class, 'edit'])->name('personajes.edit');
Route::put('personajes/{personaje}', [PersonajeController::class, 'update'])->name('personajes.update');
Route::delete('skins/{skin}', [SkinController::class, 'destroy'])->name('skins.destroy');

Route::get('skins/{skin}/edit', [SkinController::class, 'edit'])->name('skins.edit');
Route::put('skins/{skin}', [SkinController::class, 'update'])->name('skins.update');

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

require __DIR__.'/auth.php';
