<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\EmployeeDetail;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
    $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email' => 'required|email|unique:users',
        'phone_number' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'date_of_birth' => $request->date_of_birth,
        'password' => Hash::make($request->password),
    ]);

    // Create the EmployeeDetail and patch the user id
    EmployeeDetail::create([
        'employee_id'           => $user->id,  // Use the newly created user's ID
        'status'            => 'Active',   
    ]);

    return redirect()->route('login')
    ->with('success', 'User created successfully.');

}


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->except('password');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    // Login View
    public function showLoginForm()
    {
        return view('auth.login');

    }

    // Login User
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('profile')->with('success', 'Login successful');
        }
    
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully');    }
}
