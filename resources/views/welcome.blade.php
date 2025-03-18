@extends('layouts.app')

@section('title', 'Welcome to UNEP Employee Management')

@section('content')
<div class="container-fluid text-center mt-5">
    <h3 class="fw-bold text-primary">Welcome to UNEP Employee Management Tool</h3>
    <p class="lead">A smart, efficient, and secure way to manage employee records at UNEP.</p>

    <!-- Image -->
    <img src="{{ asset('images/Home.jpg') }}" alt="UNEP Employee Management" class="img-fluid rounded shadow-lg mt-3" style="max-width: 60%; height: auto;">

    @guest
    <div class="mt-4">
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Get Started</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Sign Up</a>
    </div>
    @endguest

</div>
@endsection
