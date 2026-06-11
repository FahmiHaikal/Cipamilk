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
        // 1. Validasi Input (Hapus aturan 'lowercase' di sini)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class], // 'lowercase' dihilangkan
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:konsumen,umkm'], 
        ]);

        // 2. Simpan User (Ubah email menjadi huruf kecil secara otomatis di belakang layar)
        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email), // <-- Ubah otomatis ke huruf kecil di database
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => $request->role, 
        ]);

        event(new \Illuminate\Auth\Events\Registered($user));

        \Illuminate\Support\Facades\Auth::login($user);

        // 3. LOGIKA REDIRECT BERDASARKAN ROLE
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
