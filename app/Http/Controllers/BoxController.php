<?php
namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Locataire;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = Box::with('locataire')->get();
        return view('mesbox', compact('boxes'));
    }

    public function create()
    {
        $locataires = Locataire::all();
        return view('box/createbox', compact('locataires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rented' => 'boolean',
            'locataire_id' => 'nullable|exists:locataires,id',
        ]);

        Box::create($request->all());
        return redirect()->route('boxes.index')->with('success', 'Box créée avec succès.');
    }

    public function edit(Box $box)
    {
        $locataires = Locataire::all();
        return view('box/editbox', compact('box', 'locataires'));
    }

    public function update(Request $request, Box $box)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rented' => 'boolean',
            'locataire_id' => 'nullable|exists:locataires,id',
        ]);

        $box->update($request->all());
        return redirect()->route('boxes.index')->with('success', 'Box mise à jour avec succès.');
    }

    public function destroy(Box $box)
    {
        $box->delete();
        return redirect()->route('boxes.index')->with('success', 'Box supprimée avec succès.');
    }
}
