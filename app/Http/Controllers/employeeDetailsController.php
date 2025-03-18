<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetail;
use Illuminate\Http\Request;
use App\Models\BranchUnit;
use App\Models\Division;
use App\Models\DutyStation;
use App\Models\ContractType;
use Illuminate\Support\Facades\Auth;


class employeeDetailsController extends Controller
{
    //
    public function index()
    {
        $employee_details = EmployeeDetail::with([
            'user', 
            'branchUnit', 
            'division', 
            'dutyStation', 
            'contractType', 
            'sro', 
            'fro'
        ])->get();
        //dd($employee_details);
        return view('employee_details.index', compact('employee_details'));
    }


    public function create()
    {
        return view('employee_details.create');
    }

    public function show($id = null)
{
    // If no ID is provided, use the authenticated user
    if ($id === null) {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to access your profile.');
        }
        
        $employee_details = EmployeeDetail::with([
            'user', 
            'branchUnit', 
            'division', 
            'dutyStation', 
            'contractType', 
            'sro', 
            'fro'
        ])->where('employee_id', $user->id)->first();
    } else {
        $employee_details = EmployeeDetail::with([
            'user', 
            'branchUnit', 
            'division', 
            'dutyStation', 
            'contractType', 
            'sro', 
            'fro'
        ])->find($id);
    }

    if (!$employee_details) {
        return redirect()->route('employee-details.index')
            ->with('error', 'Employee details not found.');
    }

    return view('employee_details.show', compact('employee_details'));
}


   

    public function profile()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $employee_details = $user->employeeDetail; // Assuming a one-to-one relation

        return view('employee_details.show', compact('user', 'employee_details'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:employee_details',
            // 'index_number' => 'required',        
            // 'branch_unit_id' => 'required',
            // 'division_id' => 'required',
            // 'duty_station_id' => 'required',
            // 'contract_type_id' => 'required',
            // 'start_date' => 'required|date',
            // 'end_date' => 'required|date',
            // 'status' => 'required',
        ]);

        EmployeeDetail::create($request->all());

        return redirect()->route('EmployeeDetail.index')
            ->with('success', 'EmployeeDetail created successfully.');
    }


    public function edit($id)
    {
        $employee_details = EmployeeDetail::with(['user', 'branchUnit', 'division', 'dutyStation', 'contractType'])
            ->find($id);
    
        if (!$employee_details) {
            return redirect()->route('employee-details.index')
                ->with('error', 'Employee details not found');
        }
    
        // Fetch related data for dropdowns
        $branchUnits = BranchUnit::all();
        $divisions = Division::all();
        $dutyStations = DutyStation::all();
        $contractTypes = ContractType::all();
    
        return view('employee_details.edit', compact(
            'employee_details', 'branchUnits', 'divisions', 'dutyStations', 'contractTypes'
        ));
    }
    



    public function update(Request $request, $id)
    {
        $employee_details = EmployeeDetail::find($id);
    
        if (!$employee_details) {
            return redirect()->route('employee-details.index')->with('error', 'Employee not found.');
        }
    
        \Log::info('Retrieved Employee Details', ['employee_details' => $employee_details]);
    
        $validatedData = $request->validate([
            'branch_unit_id' => 'required|exists:branch_units,id',
            'division_id' => 'required|exists:divisions,id',
            'duty_station_id' => 'required|exists:duty_stations,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|in:Active,Separated,Retired,Terminated',
        ]);
    
        $employee_details->update($validatedData);
    
        return redirect()->route('employee-details.index')
            ->with('success', 'Employee details updated successfully');
    }
    
    

    public function search(Request $request)
    {
        $search = $request->get('search');
        $employee_details = EmployeeDetail::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('employee_details.index', compact('employee_details'));
    }

    public function searchByDivision(Request $request)
    {
        $search = $request->get('search');
        $employee_details = EmployeeDetail::where('division_id', 'like', '%' . $search . '%')->paginate(5);
        return view('employee_details.index', compact('employee_details'));
    }

    public function searchByBranchUnit(Request $request)
    {
        $search = $request->get('search');
        $employee_details = EmployeeDetail::where('branch_unit_id', 'like', '%' . $search . '%')->paginate(5);
        return view('employee_details.index', compact('employee_details'));
    }

}
