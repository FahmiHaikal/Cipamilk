<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUmkmApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->role === 'umkm') {
            $umkm = $user->umkm;

            // Jika belum ada profil UMKM, atau statusnya bukan approved
            if (!$umkm || $umkm->status !== 'approved') {
                // Jangan redirect jika user sudah mencoba mengakses halaman pending-approval
                if (!$request->routeIs('umkm.pending')) {
                    return redirect()->route('umkm.pending');
                }
            }
        }

        return $next($request);
    }
}
