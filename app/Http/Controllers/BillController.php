<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Contract;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contract_id = $request->query('contract_id');
        $contract = Contract::find($contract_id);
        //dd($contract);
        if ($contract_id) {
            $bills = Bill::where('contract_id', $contract_id)->get();
        } else {
            $bills = Bill::all();
        }
        return view('bills.index', compact('bills', 'contract'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $contract_id = $request->query('contract_id');
        $contract = Contract::find($contract_id);

        return view('bills.create', compact('contract'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paiemant_montant' => 'required|numeric',
            'paymant_date' => 'required|date',
            'period_number' => 'required|integer',
            'contract_id' => 'required|exists:contracts,id',
        ]);

        Bill::create($request->all());

        return redirect()->route('bills.index', ['contract_id' => $request->contract_id])->with('success', 'Facture créée avec succès.');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return view('bills.show', compact('bill'));
    }
}
