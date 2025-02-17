<?php

namespace App\Http\Controllers;

use App\Models\ContractModel;
use Illuminate\Http\Request;

class ContractModelController extends Controller
{
    public function index()
    {
        $contractModels = ContractModel::all();
        return view('contract_models.index', compact('contractModels'));
    }

    public function create()
    {
        return view('contract_models.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|json',
        ]);

        ContractModel::create($request->all());

        return redirect()->route('contract_models.index')->with('success', 'Contract model created successfully.');
    }

    public function show(ContractModel $contractModel)
    {
        return view('contract_models.show', compact('contractModel'));
    }

    public function edit(ContractModel $contractModel)
    {
        return view('contract_models.edit', compact('contractModel'));
    }

    public function update(Request $request, ContractModel $contractModel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|json',
        ]);

        $contractModel->update($request->all());

        return redirect()->route('contract_models.index')->with('success', 'Contract model updated successfully.');
    }

    public function destroy(ContractModel $contractModel)
    {
        $contractModel->delete();
        return redirect()->route('contract_models.index')->with('success', 'Contract model deleted successfully.');
    }
}