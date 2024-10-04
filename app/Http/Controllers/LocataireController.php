<?php

namespace App\Http\Controllers;

use App\Models\Locataire;
use Illuminate\Http\Request;

class LocataireController extends Controller
{
    // Afficher tous les locataires
    public function index()
    {
        $locataires = Locataire::all();
        return view('meslocataires', compact('locataires'));
    }

    // Afficher le formulaire de création d'un nouveau locataire
    public function create()
    {
        return view('locataire/createloc');
    }

    // Stocker un nouveau locataire
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string'
        ]);

        Locataire::create($request->all());

        return redirect()->route('locataires.index')->with('success', 'Locataire créé avec succès.');
    }

    // Afficher le formulaire de modification d'un locataire
    public function edit(Locataire $locataire, Request $request)
    {
        $url = $request->query('url');
        return view('locataire/editloc', compact('locataire', 'url'));
    }

    // Mettre à jour un locataire
    public function update(Request $request, Locataire $locataire)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string'
        ]);

        $locataire->update($request->all());

        return redirect()->route('locataires.index')->with('success', 'Locataire mis à jour avec succès.');
    }

    // Supprimer un locataire
    public function destroy(Locataire $locataire)
    {
        $locataire->delete();
        return redirect()->route('locataires.index')->with('success', 'Locataire supprimé avec succès.');
    }
}
