<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use Inertia\Inertia;
use App\Models\Offre;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'offres' => Offre::latest()->get() 
    ]);
})->name('home');

Route::post('/offre', [OffreController::class, 'poste'])->name('links.offre');