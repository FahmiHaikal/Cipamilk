<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\View\View;

class UmkmController extends Controller
{
    public function show(Umkm $umkm): View
    {
        $umkm->load('products');

        return view('umkm.show', compact('umkm'));
    }
}