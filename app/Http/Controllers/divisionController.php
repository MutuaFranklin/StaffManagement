<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class divisionController extends Controller
{
    //all divisions
    public function index()
    {
        $divisions = division::all();
        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'director_id' => 'required',
            'deputy_director_id' => 'required',
        ]);

        division::create($request->all());

        return redirect()->route('divisions.index')
            ->with('success', 'division created successfully.');
    }

    public function edit(division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, division $division)
    {
        $request->validate([
            'name' => 'required',
            'director_id' => 'required',
            'deputy_director_id' => 'required',
        ]);

        $division->update($request->all());

        return redirect()->route('divisions.index')
            ->with('success', 'division updated successfully');
    }

    public function destroy(division $division)
    {
        $division->delete();

        return redirect()->route('divisions.index')
            ->with('success', 'division deleted successfully');
    }

    public function show(division $division)
    {
        return view('divisions.show', compact('division'));
    }


}
