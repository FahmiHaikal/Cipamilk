<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $role = $request->user()->role;
        $dashboardRoute = $role === 'admin' ? 'admin.dashboard' : ($role === 'umkm' ? 'umkm.dashboard' : 'home');
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route($dashboardRoute, absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $role = $request->user()->role;
        $dashboardRoute = $role === 'admin' ? 'admin.dashboard' : ($role === 'umkm' ? 'umkm.dashboard' : 'home');
        return redirect()->intended(route($dashboardRoute, absolute: false).'?verified=1');
    }
}
