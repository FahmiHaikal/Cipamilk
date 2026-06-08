<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $umkm = Auth::user()->umkm;

        return view(
            'umkm.settings.index',
            compact('umkm')
        );
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'pemilik' => 'nullable',
            'whatsapp' => 'required',
            'alamat' => 'nullable',
            'story' => 'nullable',
        ]);

        Auth::user()
            ->umkm
            ->update($request->only([
                'nama_umkm',
                'pemilik',
                'whatsapp',
                'alamat',
                'story'
            ]));

        return back();
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:8'
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make(
                $request->password
            );
        }

        $user->save();

        return back();
    }
}
