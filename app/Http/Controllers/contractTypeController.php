<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractType;
class contractTypeController extends Controller
{
    //
    public function index()
    {
        $contract_types = ContractType::all();
        return view('contract_types.index', compact('contract_types'));
    }

    public function create()
    {
        return view('contract_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        ContractType::create($request->all());

        return redirect()->route('contract_types.index')
            ->with('success', 'contract_type created successfully.');
    }

    public function edit(ContractType $contract_type)
    {
        return view('contract_types.edit', compact('contract_type'));
    }

    public function update(Request $request, ContractType $contract_type)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $contract_type->update($request->all());

        return redirect()->route('contract_types.index')
            ->with('success', 'contract_type updated successfully');
    }
}
