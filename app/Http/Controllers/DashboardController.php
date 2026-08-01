<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private function checkAccess(string $role)
    {
        return Auth::check() && Auth::user()->role === $role;
    }

    public function admin()
    {
        if (!$this->checkAccess('admin')) return redirect()->route('login');
        return view('dashboard.admin');
    }

    public function pasien()
    {
        if (!$this->checkAccess('pasien')) return redirect()->route('login');
        return view('dashboard.pasien');
    }

    public function dokter()
    {
        if (!$this->checkAccess('dokter')) return redirect()->route('login');
        return view('dashboard.dokter');
    }

    public function apoteker()
    {
        if (!$this->checkAccess('apoteker')) return redirect()->route('login');
        return view('dashboard.apoteker');
    }

    public function owner()
    {
        if (!$this->checkAccess('owner')) return redirect()->route('login');
        return view('dashboard.owner');
    }
}
