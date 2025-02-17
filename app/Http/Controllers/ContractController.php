<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractModel;
use App\Models\Box;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        $contractModels = ContractModel::all();
        $boxes = Box::all();
        $owners = User::all(); // Utilisez le modèle User pour les propriétaires
        $tenants = Tenant::all(); // Utilisez le modèle Tenant pour les locataires
        return view('contracts.create', compact('contractModels', 'boxes', 'owners', 'tenants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
            'owner_id' => 'required|exists:users,id',
            'contract_model_id' => 'required|exists:contract_models,id',
        ]);

        Contract::create($request->all());

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
        $owners = User::all(); // Utilisez le modèle User pour les propriétaires
        $tenants = Tenant::all(); // Utilisez le modèle Tenant pour les locataires
        return view('contracts.edit', compact('contract', 'contractModels', 'boxes', 'owners', 'tenants'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
            'owner_id' => 'required|exists:users,id',
            'contract_model_id' => 'required|exists:contract_models,id',
        ]);

        $contract->update($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')->with('success', 'Contrat supprimé avec succès.');
    }
}