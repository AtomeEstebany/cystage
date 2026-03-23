<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use Inertia\Inertia;
use App\Models\Offre;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'offre' => Offre::latest()->get() 
    ]);
})->name('home');

Route::post('/offre', [PosteController::class, 'offre'])->name('links.offre');