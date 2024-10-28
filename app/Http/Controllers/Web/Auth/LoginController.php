<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login view
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to authenticate the employee using the 'employee' guard
        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home'); // Redirect on success
        }

        // Redirect back with error message if failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form'); // Redirect after logout
    }
}
