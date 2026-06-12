<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with('user')->get();

        $totalUmkm = Umkm::count();
        $pendingUmkm = Umkm::where('status', 'pending')->count();
        $approvedUmkm = Umkm::where('status', 'approved')->count();

        return view(
            'admin.umkms.umkm',
            compact(
                'umkms',
                'totalUmkm',
                'pendingUmkm',
                'approvedUmkm'
            )
        );
    }

    public function approve($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'UMKM berhasil disetujui.');
    }

    public function reject($id)
    {
        $umkm = Umkm::findOrFail($id);
        
        // Revert user role to konsumen
        $user = $umkm->user;
        if ($user) {
            $user->update(['role' => 'konsumen']);
        }

        // Delete UMKM profile
        $umkm->delete();

        return back()->with('success', 'Pendaftaran UMKM ditolak, peran pengguna dikembalikan menjadi konsumen.');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        $user = $umkm->user;

        // Delete UMKM profile
        $umkm->delete();

        // Delete associated User account
        if ($user) {
            $user->delete();
        }

        return back()->with('success', 'UMKM dan akun pengguna terkait berhasil dihapus secara permanen.');
    }
}
