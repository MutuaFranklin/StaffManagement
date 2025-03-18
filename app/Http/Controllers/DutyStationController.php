<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DutyStation;	

class DutyStationController extends Controller
{
    //
    public function index()
    {
        return view('duty_station');
    }


    public function create()
    {
        return view('duty_station');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        DutyStation::create($request->all());

        return redirect()->route('duty_station')
            ->with('success', 'Duty station created successfully.');
    }

    public function show(DutyStation $dutyStation)
    {
        return view('duty_station', compact('dutyStation'));
    }

}
