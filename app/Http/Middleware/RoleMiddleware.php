<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- 1. Tambahkan import Facade Auth ini

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // 2. Ganti auth() menjadi Auth::
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 3. Ganti auth() menjadi Auth::
        if (Auth::user()->role !== $role) {
            abort(403, 'Akses Ditolak. Halaman ini bukan untuk Anda.');
        }

        return $next($request);
    }
}