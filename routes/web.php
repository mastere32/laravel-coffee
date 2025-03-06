<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/map', [MapController::class, 'index'])->name('map.index');
    Route::get('/map/fetchAllCoordinates', [MapController::class, 'fetchAllCoordinates'])->name('map.fetchAllCoordinates');
    Route::get('/map/{map}', [MapController::class, 'show'])->name('map.show');
    Route::get('/map/edit/{map}', [MapController::class, 'edit'])->name('map.edit');
    Route::put('/map/{map}', [MapController::class, 'update'])->name('map.update');
    Route::delete('/map/{map}', [MapController::class, 'destroy'])->name('map.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
