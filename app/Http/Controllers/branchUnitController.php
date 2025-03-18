<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branchUnit;

class branchUnitController extends Controller
{
    //
    public function index()
    {
        $branch_units = branchUnit::all();
        return view('branch_units.index', compact('branch_units'));
    }

    public function create()
    {
        return view('branch_units.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'head_id' => 'required',
            'division_id' => 'required',
        ]);

        branchUnit::create($request->all());

        return redirect()->route('branch_units.index')
            ->with('success', 'branch_unit created successfully.');
    }

    public function edit(branchUnit $branch_unit)
    {
        return view('branch_units.edit', compact('branch_unit'));
    }

    public function update(Request $request, branchUnit $branch_unit)
    {
        $request->validate([
            'name' => 'required',
            'head_id' => 'required',
            'division_id' => 'required',
        ]);

        $branch_unit->update($request->all());

        return redirect()->route('branch_units.index')
            ->with('success', 'branch_unit updated successfully');
    }
}
