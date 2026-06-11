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

        // Ambil role dari user yang baru saja berhasil login
        $role = $request->user()->role;

        // Arahkan ke halaman masing-masing sesuai role
        if ($role === 'admin') {
            // Super Admin ke Dashboard Admin
            return redirect()->intended(route('admin.dashboard', absolute: false));
            
        } elseif ($role === 'umkm') {
            // UMKM ke Dashboard UMKM
            return redirect()->intended(route('umkm.dashboard', absolute: false));
            
        } else {
            // Konsumen/Tamu biasa dikembalikan ke Landing Page (Beranda)
            return redirect()->intended(route('home', absolute: false));
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
