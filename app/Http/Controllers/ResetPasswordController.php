<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showResetForm()
    {
        return view('admin.autentikasi.password');
    }

    public function index()
    {
        return view('reset-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user();

        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = \Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }
}