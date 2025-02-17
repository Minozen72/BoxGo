<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxController extends Controller
{
    /**
     * Affiche le formulaire de gestion des impôts.
     */
    public function index()
    {
        return view('taxes.index');
    }

    /**
     * Calcule et affiche les informations fiscales.
     */
    public function calculate(Request $request)
    {
        $owner_id = Auth::id(); // Récupère l'ID de l'utilisateur connecté
        $year = $request->input('year');

        // Récupérer toutes les factures pour tous les contrats du propriétaire et l'année spécifiés
        $bills = Bill::whereHas('contract', function ($query) use ($owner_id) {
            $query->where('owner_id', $owner_id);
        })->whereYear('paymant_date', $year)->get();

        // Calculer le montant total des factures
        $total_amount = $bills->sum('paiemant_montant');

        // Déterminer le régime fiscal et les montants imposables
        if ($total_amount <= 15000) {
            $regime = 'micro-foncier';
            $case = '4 BE déclaration n°2042';
            $imposable_amount = $total_amount * 0.70; // Abattement de 30%
        } else {
            $regime = 'réel';
            $case = '4 BA déclaration n°2044';
            $imposable_amount = $total_amount; // 100% des revenus
        }

        return view('taxes.result', compact('total_amount', 'regime', 'case', 'imposable_amount', 'year'));
    }
}
