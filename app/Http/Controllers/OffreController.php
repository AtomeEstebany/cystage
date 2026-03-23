<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Inertia\Inertia;

class OffreController extends Controller
{
    public function index() {
    return Inertia::render('Welcome', [
        'offre' => \App\Models\Code::latest()->first() 
    ]);
    }
    public function poste(Request $request) {
        $validated = $request->validate([
            'nom' => 'required|string|min:3',
            'entreprise' =>'required|string',
            'adresse' =>'required|string',
            'description' => 'required|string',
        ]);

        \App\Models\Code::create([
            'nom' => $request->nom,
            'entreprise' => $request->entreprise,
            'adresse' => $request->adresse,
            'description' => $request->description
        ]);

        return back()->with('success','Code partagé avec succès');
    }
}