@extends('layouts.app')

@section('title', 'Employee List')

@section('content')

<div class="container-fluid mt-4">
    <h4 class="mb-4">Employee List</h4>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Index Number</th>
                <th>Full Names</th>
                <th>Email</th>
                <th>Current Location</th>
                <th>Highest Level of Education</th>
                <th>Duty Station</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee_details as $employee_detail)
            <tr>
                <td>{{ $employee_detail->index_number }}</td>
                <td>{{ $employee_detail->user->first_name }} {{ $employee_detail->user->last_name }}</td>
                <td>{{ $employee_detail->user->email }}</td>
                <td>{{ $employee_detail->current_location }}</td>
                <td>{{ $employee_detail->highest_level_of_education }}</td>
                <td>{{ $employee_detail->dutyStation->name }}</td>
                <td>
                    <a href="{{ route('employee-details.show', $employee_detail->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('employee-details.edit', $employee_detail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('employee-details.destroy', $employee_detail->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
