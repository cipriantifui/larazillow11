<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create($request->only('name', 'email', 'password'));
        \Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->route('listing.index')
            ->with('success', 'Account created successfully');
    }
}
