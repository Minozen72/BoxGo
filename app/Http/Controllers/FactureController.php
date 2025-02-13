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
    public function index()
    {
        $factures = Facture::with('box')->get();
        return view('factures.index', compact('factures'));
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
        $request->validate([
            'date_recu' => 'required|date',
            'periode_debut' => 'required|date',
            'periode_fin' => 'required|date',
            'signature' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'ville_creation' => 'required|string|max:255',
            'box_id' => 'required|exists:boxes,id',
        ]);

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
