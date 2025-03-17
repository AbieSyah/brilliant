<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.autentikasi.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|confirmed',
            'username' => 'required|unique:users|min:3|max:255',
            'birthdate' => 'required|date|before:'.Carbon::now()->subYears(22)->format('Y-m-d')
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'birthdate' => $validatedData['birthdate']
        ]);

        Auth::login($user);

        return redirect('/login')->with('success', 'Registration successful! Welcome!');
    }
}