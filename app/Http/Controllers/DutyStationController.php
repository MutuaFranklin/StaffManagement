<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DutyStation;

class dutyStationController extends Controller
{
    //
    Public function index()
    {
        $duty_stations = DutyStation::all();
        return view('duty_stations.index', compact('duty_stations'));
    }

    public function create()
    {
        return view('duty_stations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        DutyStation::create($request->all());

        return redirect()->route('duty_stations.index')
            ->with('success', 'duty_station created successfully.');
    }

    public function edit(DutyStation $duty_station)
    {
        return view('duty_stations.edit', compact('duty_station'));
    }
    
    public function update(Request $request, DutyStation $duty_station)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $duty_station->update($request->all());

        return redirect()->route('duty_stations.index')
            ->with('success', 'duty_station updated successfully');
    }

    public function destroy(DutyStation $duty_station)
    {
        $duty_station->delete();

        return redirect()->route('duty_stations.index')
            ->with('success', 'duty_station deleted successfully');
    }
}
