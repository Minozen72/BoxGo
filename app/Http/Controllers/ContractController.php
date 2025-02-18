<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractModel;
use App\Models\Box;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $contracts = Contract::where('owner_id', $user->id)->get();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        $contractModels = ContractModel::all();
        $boxes = Box::all();
        $tenants = Tenant::all(); // Utilisez le modèle Tenant pour les locataires
        return view('contracts.create', compact('contractModels', 'boxes', 'tenants'));
    }

    public function store(Request $request)
    {
        $owner_id = Auth::id(); // Récupère l'ID de l'utilisateur connecté

        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
            'contract_model_id' => 'required|exists:contract_models,id',
        ]);

        $data = $request->all();
        $data['owner_id'] = $owner_id;

        Contract::create($data);

        return redirect()->route('contracts.index')->with('success', 'Contrat créé avec succès.');
    }

    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $contractModels = ContractModel::all();
        $boxes = Box::all();
        $tenants = Tenant::all(); // Utilisez le modèle Tenant pour les locataires
        return view('contracts.edit', compact('contract', 'contractModels', 'boxes', 'tenants'));
    }

    public function update(Request $request, Contract $contract)
    {
        $owner_id = Auth::id(); // Récupère l'ID de l'utilisateur connecté
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
            'contract_model_id' => 'required|exists:contract_models,id',
            'contract_model_id' => 'required|exists:contract_models,id',
        ]);

        $data = $request->all();
        $data['owner_id'] = $owner_id;
        $contract->update($data);

        return redirect()->route('contracts.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')->with('success', 'Contrat supprimé avec succès.');
    }
}