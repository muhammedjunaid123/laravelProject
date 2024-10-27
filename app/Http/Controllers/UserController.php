<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('list', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'class' => 'required|string|max:100',
            'division' => 'required|string|max:100',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'class' => $request->class,
                'division' => $request->division,
            ]);
            return redirect('login')->with('success', 'User registered successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to register user.'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userData = Auth::user();
        return view('home', ["user" => $userData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:100',
            'division' => 'required|string|max:100',
        ]);

        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->division = $request->division;
            $user->class = $request->class;
            $user->save();

            return redirect('home')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update user.'])->withInput();
        }
    }
}
