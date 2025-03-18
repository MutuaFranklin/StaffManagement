<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DutyStation;
use App\Models\StaffDetails;

class EmployeeDetailsController extends Controller
{
    //
    public function index()
    {
        return view('employee_details');
    }

    public function create()
    {
        return view('employee_details');
    }

    public function store(Request $request)
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

        return redirect()->route('employee_details')
            ->with('success', 'Employee details created successfully.');
    }

    public function show(StaffDetails $staffDetails)
    {
        return view('employee_details', compact('staffDetails'));
    }

    public function edit(StaffDetails $staffDetails)
    {
        return view('employee_details', compact('staffDetails'));
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

        return redirect()->route('employee_details')
            ->with('success', 'Employee details updated successfully');
    }

    public function destroy(StaffDetails $staffDetails)
    {
        $staffDetails->delete();

        return redirect()->route('employee_details')
            ->with('success', 'Employee details deleted successfully');
    }
}
