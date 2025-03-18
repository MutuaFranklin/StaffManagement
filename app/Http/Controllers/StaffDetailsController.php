<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffDetails;

class StaffDetailsController extends Controller
{
    //
    public function index()
    {
        return view('staff_details.index');
    }

    public function create()
    {
        return view('staff_details.create');
    }

    Public function store(Request $request)
    {
        $request->validate([
            'index_number' => 'required',
            'staff_id' => 'required',
            'current_location' => 'required',
            'highest_level_of_education' => 'required',
            'duty_station_id' => 'required',
            'duty_station' => 'required',
            'availability_for_remote_work' => 'required',
            'software_expertise' => 'required',
            'language' => 'required',
            'software_expertise_level' => 'required',
            'level_of_responsibility' => 'required',
        ]);

        StaffDetails::create($request->all());

        return redirect()->route('staff_details.index')
            ->with('success', 'Staff details created successfully.');
    }

    public function show(StaffDetails $staffDetails)
    {
        return view('staff_details.show', compact('staffDetails'));
    }

    public function edit(StaffDetails $staffDetails)
    {
        return view('staff_details.edit', compact('staffDetails'));
    }

    public function update(Request $request, StaffDetails $staffDetails)
    {
        $request->validate([
            'index_number' => 'required',
            'staff_id' => 'required',
            'current_location' => 'required',
            'highest_level_of_education' => 'required',
            'duty_station_id' => 'required',
            'duty_station' => 'required',
            'availability_for_remote_work' => 'required',
            'software_expertise' => 'required',
            'language' => 'required',
            'software_expertise_level' => 'required',
            'level_of_responsibility' => 'required',
        ]);

        $staffDetails->update($request->all());

        return redirect()->route('staff_details.show')
            ->with('success', 'Staff details updated successfully');
    }

    public function destroy(StaffDetails $staffDetails)
    {
        $staffDetails->delete();

        return redirect()->route('staff_details.index')
            ->with('success', 'Staff details deleted successfully');
    }
}
