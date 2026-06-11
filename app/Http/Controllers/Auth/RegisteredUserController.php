<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:konsumen,umkm'], 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => $request->role, 
        ]);

        // --- TAMBAHKAN BLOK KODE INI ---
        // Jika yang mendaftar adalah UMKM, otomatis buatkan profil toko awal
        if ($user->role === 'umkm') {
            \App\Models\Umkm::create([
                'user_id' => $user->id,
                'nama_umkm' => 'Toko ' . $user->name, // Beri nama toko bawaan
                'whatsapp' => '-', // Beri nilai default agar tidak error jika kolom ini required di database
            ]);
        }
        // -------------------------------

        event(new \Illuminate\Auth\Events\Registered($user));

        \Illuminate\Support\Facades\Auth::login($user);

        $role = $user->role;

        if ($role === 'admin') {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } elseif ($role === 'umkm') {
            return redirect()->intended(route('umkm.dashboard', absolute: false));
        } else {
            return redirect()->intended(route('home', absolute: false));
        }
    }
}
