<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource (register).
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Load the login form.
     */
    public function loadLogin()
    {
        return view('login');
    }

    /**
     * Authenticate the user.
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            // Attempt to authenticate the user
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('home');
            }
        } catch (\Exception $e) {
            // Handle exception (e.g., log the error)
            return back()->withErrors(['email' => 'An error occurred during authentication.'])->withInput($request->only('email'));
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput($request->only('email'));
    }

    /**
     * Logout the user.
     */
    public function logout()
    {
        try {
            Auth::logout();
        } catch (\Exception $e) {
            // Handle exception (e.g., log the error)
            return back()->withErrors(['logout' => 'An error occurred while logging out.']);
        }

        return redirect('login');
    }
}
