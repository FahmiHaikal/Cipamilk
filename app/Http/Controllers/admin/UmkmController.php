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

        return view(
            'admin.umkms.umkm',
            compact(
                'umkms',
                'totalUmkm'
            )
        );
    }
}
