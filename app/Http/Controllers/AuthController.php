<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $isAuthenticate = \Auth::attempt($request->only('email', 'password'), true);
        if($isAuthenticate === false) {
            throw ValidationException::withMessages(['email' => 'Invalid credentials']);
        }

        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }

    public function destroy(Request $request)
    {
        \Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('listing.index');
    }
}
