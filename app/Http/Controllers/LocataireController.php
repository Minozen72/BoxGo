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
        return view('locataires.index', compact('locataires'));
    }

    // Afficher le formulaire de création d'un nouveau locataire
    public function create()
    {
        return view('locataires.create');
    }

    // Stocker un nouveau locataire
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Ajoute d'autres validations selon tes besoins
        ]);

        Locataire::create($request->all());

        return redirect()->route('locataires.index')->with('success', 'Locataire créé avec succès.');
    }

    // Afficher le formulaire de modification d'un locataire
    public function edit(Locataire $locataire)
    {
        return view('locataires.edit', compact('locataire'));
    }

    // Mettre à jour un locataire
    public function update(Request $request, Locataire $locataire)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Ajoute d'autres validations selon tes besoins
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
