@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Employee Details</h4>
        <a href="{{ route('employee-details.edit', $employee_details->id) }}" class="btn btn-warning">Edit</a>
    </div>

    <div class="row g-3">
        <!-- Personal Information -->
        <div class="col-md-6 d-flex">
            <div class="card w-100 h-100">
                <div class="card-header bg-primary text-white">Personal Information</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $employee_details->user->first_name ?? 'N/A' }} {{ $employee_details->user->last_name ?? '' }}</p>
                    <p><strong>Email:</strong> {{ $employee_details->user->email ?? 'N/A' }}</p>
                    <p><strong>Index Number:</strong> {{ $employee_details->index_number }}</p>
                    <p><strong>Status:</strong> 
                        @if($employee_details->status == 'Active')
                            <span class="badge bg-success">Active</span>
                        @elseif($employee_details->status == 'Separated')
                            <span class="badge bg-warning text-dark">Separated</span>
                        @elseif($employee_details->status == 'Terminated')
                            <span class="badge bg-danger">Terminated</span>
                        @elseif($employee_details->status == 'Retired')
                            <span class="badge bg-secondary">Retired</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Work Information -->
        <div class="col-md-6 d-flex">
            <div class="card w-100 h-100">
                <div class="card-header bg-info text-white">Work Information</div>
                <div class="card-body">
                    <p><strong>Job Title:</strong> {{ $employee_details->job_title ?? 'N/A' }}</p>
                    <p><strong>Contract Type:</strong> {{ $employee_details->contractType->name ?? 'N/A' }}</p>
                    <p><strong>Start Date:</strong> {{ $employee_details->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $employee_details->end_date ?? 'Ongoing' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-3">
        <!-- Organizational Information -->
        <div class="col-md-6 d-flex">
            <div class="card w-100 h-100">
                <div class="card-header bg-secondary text-white">Organizational Information</div>
                <div class="card-body">
                    <p><strong>Division:</strong> {{ $employee_details->division->name ?? 'N/A' }}</p>
                    <p><strong>Branch Unit:</strong> {{ $employee_details->branchUnit->name ?? 'N/A' }}</p>
                    <p><strong>Duty Station:</strong> {{ $employee_details->dutyStation->name ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Reporting Officers -->
        <div class="col-md-6 d-flex">
            <div class="card w-100 h-100">
                <div class="card-header bg-dark text-white">Reporting Officers</div>
                <div class="card-body">
                    <p><strong>First Reporting Officer (FRO):</strong> {{ $employee_details->fro->first_name ?? 'N/A' }} {{ $employee_details->fro->last_name ?? '' }}</p>
                    <p><strong>Second Reporting Officer (SRO):</strong> {{ $employee_details->sro->first_name ?? 'N/A' }} {{ $employee_details->sro->last_name ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4">
        <a href="{{ route('employee-details.index') }}" class="btn btn-outline-primary">Back to Employee List</a>
    </div>

</div>
@endsection
