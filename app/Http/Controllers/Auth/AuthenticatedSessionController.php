<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        //membuat autentifikasi login sesuai dengan data dari 
        //database yaitu sesuai dengan kolom role
        // dd($request->user()->role); untuk cek saja baris ini

        //buat percabangannya ketika login role admin / agent / user
        if($request->user()->role == 'admin'){
            //jika yang login role nya admin maka url akan menuju ke admin/dashboard
            return redirect()->intended('admin/dashboard');
        }elseif($request->user()->role == 'agent'){
            //jika yang login role nya agent maka url akan menuju ke agent/dashboard
            return redirect()->intended('agent/dashboard');
        }elseif($request->user()->role == 'user'){
            return redirect()->intended(route('dashboard', absolute: false));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
