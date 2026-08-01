<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;

            return redirect()->route("dashboard.{$role}");
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|unique:users,username|max:50',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'nohp'     => 'required|string|max:15',
            'jk'       => 'required|in:L,P',
        ]);

        $validated['role'] = 'pasien';

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('dashboard.pasien');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
