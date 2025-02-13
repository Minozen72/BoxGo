<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Box;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $box_id = $request->query('box_id');
        $factures = Facture::where('box_id', $box_id)->with('box')->get();
        return view('factures.mesfactures', compact('factures', 'box_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boxes = Box::all();
        return view('factures.create', compact('boxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'date_recu.required' => 'La date de réception est obligatoire.',
            'date_recu.date' => 'La date de réception doit être une date valide.',
            'periode_debut.required' => 'La date de début de période est obligatoire.',
            'periode_debut.date' => 'La date de début de période doit être une date valide.',
            'periode_fin.required' => 'La date de fin de période est obligatoire.',
            'periode_fin.date' => 'La date de fin de période doit être une date valide.',
            'signature.required' => 'La signature est obligatoire.',
            'signature.string' => 'La signature doit être une chaîne de caractères.',
            'signature.max' => 'La signature ne doit pas dépasser 255 caractères.',
            'date_creation.required' => 'La date de création est obligatoire.',
            'date_creation.date' => 'La date de création doit être une date valide.',
            'ville_creation.required' => 'La ville de création est obligatoire.',
            'ville_creation.string' => 'La ville de création doit être une chaîne de caractères.',
            'ville_creation.max' => 'La ville de création ne doit pas dépasser 255 caractères.',
            'box_id.required' => 'L\'identifiant de la box est obligatoire.',
            'box_id.exists' => 'L\'identifiant de la box doit exister dans la base de données.',
        ];

        $request->validate([
            'date_recu' => 'required|date',
            'periode_debut' => 'required|date',
            'periode_fin' => 'required|date',
            'signature' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'ville_creation' => 'required|string|max:255',
            'box_id' => 'required|exists:boxes,id',
        ], $messages);

        Facture::create($request->all());

        return redirect()->route('factures.index')->with('success', 'Facture créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        return view('factures.show', compact('facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        $boxes = Box::all();
        return view('factures.edit', compact('facture', 'boxes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        $request->validate([
            'date_recu' => 'required|date',
            'periode_debut' => 'required|date',
            'periode_fin' => 'required|date',
            'signature' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'ville_creation' => 'required|string|max:255',
            'box_id' => 'required|exists:boxes,id',
        ]);

        $facture->update($request->all());

        return redirect()->route('factures.index')->with('success', 'Facture mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        $facture->delete();

        return redirect()->route('factures.index')->with('success', 'Facture supprimée avec succès.');
    }
}
