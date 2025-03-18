@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Employee Details</h4>
    


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('employee-details.update', $employee_details->id) }}" method="POST">
    @csrf
        @method('PUT')

        <!-- Branch Unit -->
        <div class="mb-3">
            <label for="branch_unit_id" class="form-label">Branch Unit</label>
            <select class="form-select" id="branch_unit_id" name="branch_unit_id" required>
                <option value="" disabled>Select Branch Unit</option>
                @foreach($branchUnits as $unit)
                    <option value="{{ $unit->id }}" {{ $employee_details->branch_unit_id == $unit->id ? 'selected' : '' }}>
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Division -->
        <div class="mb-3">
            <label for="division_id" class="form-label">Division</label>
            <select class="form-select" id="division_id" name="division_id" required>
                <option value="" disabled>Select Division</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}" {{ $employee_details->division_id == $division->id ? 'selected' : '' }}>
                        {{ $division->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Duty Station -->
        <div class="mb-3">
            <label for="duty_station_id" class="form-label">Duty Station</label>
            <select class="form-select" id="duty_station_id" name="duty_station_id" required>
                <option value="" disabled>Select Duty Station</option>
                @foreach($dutyStations as $station)
                    <option value="{{ $station->id }}" {{ $employee_details->duty_station_id == $station->id ? 'selected' : '' }}>
                        {{ $station->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Contract Type -->
        <div class="mb-3">
            <label for="contract_type_id" class="form-label">Contract Type</label>
            <select class="form-select" id="contract_type_id" name="contract_type_id" required>
                <option value="" disabled>Select Contract Type</option>
                @foreach($contractTypes as $contract)
                    <option value="{{ $contract->id }}" {{ $employee_details->contract_type_id == $contract->id ? 'selected' : '' }}>
                        {{ $contract->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Start Date -->
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $employee_details->start_date) }}" required>
        </div>

        <!-- End Date -->
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $employee_details->end_date) }}">
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Active" {{ $employee_details->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Separated" {{ $employee_details->status == 'Separated' ? 'selected' : '' }}>Separated</option>
                <option value="Retired" {{ $employee_details->status == 'Retired' ? 'selected' : '' }}>Retired</option>
                <option value="Terminated" {{ $employee_details->status == 'Terminated' ? 'selected' : '' }}>Terminated</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employee-details.show', $employee_details->id) }}" class="btn btn-secondary">Cancel</a>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

   
</div>
@endsection
