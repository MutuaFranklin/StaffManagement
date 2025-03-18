<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'UNEP Employee Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #009EDB; /* UNEP Blue */
        }
        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: white !important;
        }
        .navbar-custom .nav-link:hover {
            color: #f8f9fa !important; /* Light hover effect */
        }
    </style>
</head>
<body class="container-fluid mt-4">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">UNEP Employee Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('employee-details.index') }}">Employee List</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">My Profile</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
