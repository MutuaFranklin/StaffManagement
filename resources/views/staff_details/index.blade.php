<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Staff Management Portal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    </head>
    <body>

            <table>
            <th></th>
            <th>Index Number</th>
            <th>Full Names</th>
            <th>Email</th>
            <th>Current Location</th>
            <th>Highest Level of Education</th>
            <th>Duty Station</th>
            <th>Actions</th>
            
            @foreach($staff_details as $staff_detail)
            <tr>
                <td></td>
                <td>{{ $staff_detail->index_number }}</td>
                <td>{{ $staff_detail->full_names }}</td>
                <td>{{ $staff_detail->email }}</td>
                <td>{{ $staff_detail->current_location }}</td>
                <td>{{ $staff_detail->highest_level_of_education }}</td>
                <td>{{ $staff_detail->duty_station }}</td>
                <td>
                    <a href="{{ route('staff_details.show', $staff_detail->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('staff_details.edit', $staff_detail->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('staff_details.destroy', $staff_detail->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </tr>
            @endforeach

        </table>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        
    </body>
</html>
