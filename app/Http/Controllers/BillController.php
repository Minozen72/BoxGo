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
        $validated = $request->validate([
            'paiemant_montant' => 'required|numeric',
            'paymant_date' => 'nullable|date',
            'contract_id' => 'required|exists:contracts,id',
        ]);

        // Get the last period number for this contract
        $lastBill = Bill::where('contract_id', $request->contract_id)
                        ->orderBy('period_number', 'desc')
                        ->first();
        
        $period_number = $lastBill ? $lastBill->period_number + 1 : 1;

        $data = $request->all();
        $data['period_number'] = $period_number;
        if (empty($data['paymant_date'])) {
            $data['paymant_date'] = null;
        }

        Bill::create($data);

        return redirect()->route('bills.index', ['contract_id' => $request->contract_id])
            ->with('success', 'Facture créée avec succès.');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return view('bills.show', compact('bill'));
    }

    /**
     * Display user's bills with payment status.
     */
    public function payment()
    {
        $user = auth()->user();
        $bills = Bill::whereHas('contract', function($query) use ($user) {
            $query->where('owner_id', $user->id);
        })->orderBy('period_number', 'desc')->get();

        return view('bills.payment', compact('bills'));
    }

    public function update(Request $request, Bill $bill)
    {
        if (!$bill->paymant_date) {
            $request->validate([
                'paymant_date' => 'required|date'
            ]);

            $bill->update([
                'paymant_date' => $request->paymant_date
            ]);

            return redirect()->route('bills.payment')->with('success', 'Date de paiement mise à jour avec succès');
        }

        return redirect()->route('bills.payment')->with('error', 'Cette facture a déjà été payée');
    }

    public function generateMonthlyBills()
    {
        $user = auth()->user();
        $contracts = Contract::where('owner_id', $user->id)
            ->where('date_end', '>', now())
            ->get();

        if ($contracts->isEmpty()) {
            return redirect()->route('bills.payment')
                ->with('error', 'Aucun contrat actif trouvé');
        }

        $billsCreated = 0;
        $currentMonth = now();

        foreach ($contracts as $contract) {            
            $existingBill = Bill::where('contract_id', $contract->id)
                ->whereYear('created_at', '=', $currentMonth->year)
                ->whereMonth('created_at', '=', $currentMonth->month)
                ->first();


            if (!$existingBill) {
                $lastBill = Bill::where('contract_id', $contract->id)
                    ->orderBy('period_number', 'desc')
                    ->first();
                
                $period_number = $lastBill ? $lastBill->period_number + 1 : 1;

                try {
                    Bill::create([
                        'paiemant_montant' => $contract->monthly_price,
                        'paymant_date' => null,
                        'period_number' => $period_number,
                        'contract_id' => $contract->id
                    ]);

                    $billsCreated++;
                } catch (\Exception $e) {
                }
            }
        }

        $message = $billsCreated > 0 
            ? "$billsCreated factures ont été générées avec succès"
            : "Toutes les factures du mois ont déjà été générées";

        return redirect()->route('bills.payment')
            ->with('success', $message);
    }
}
