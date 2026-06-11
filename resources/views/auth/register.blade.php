@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-16 px-4">
    <div class="bg-white p-8 rounded-[2rem] border-[3px] border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <h2 class="text-3xl font-h1 uppercase mb-6 text-center">Daftar Akun</h2>
        
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            
            <div>
                <label class="font-label-bold uppercase text-sm">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full mt-1 p-3 border-[3px] border-black rounded-xl focus:border-green-600 focus:ring-0 transition-colors" required autofocus>
                @error('name')
                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label class="font-label-bold uppercase text-sm">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full mt-1 p-3 border-[3px] border-black rounded-xl focus:border-green-600 focus:ring-0 transition-colors" required>
                @error('email')
                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label class="font-label-bold uppercase text-sm">Daftar Sebagai</label>
                <select name="role" class="w-full mt-1 p-3 border-[3px] border-black rounded-xl bg-white focus:border-green-600 focus:ring-0 transition-colors">
                    <option value="konsumen" {{ old('role') == 'konsumen' ? 'selected' : '' }}>Konsumen</option>
                    <option value="umkm" {{ old('role') == 'umkm' ? 'selected' : '' }}>Mitra UMKM</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label class="font-label-bold uppercase text-sm">Password</label>
                <input type="password" name="password" 
                    class="w-full mt-1 p-3 border-[3px] border-black rounded-xl focus:border-green-600 focus:ring-0 transition-colors" required>
                @error('password')
                    <p class="text-red-500 text-xs font-bold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="font-label-bold uppercase text-sm">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" 
                    class="w-full mt-1 p-3 border-[3px] border-black rounded-xl focus:border-green-600 focus:ring-0 transition-colors" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-label-bold uppercase py-4 rounded-xl border-[3px] border-black shadow-[4px_4px_0px_0px_#000] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all mt-6">
                Daftar Akun
            </button>
        </form>

        <div class="mt-8 text-center text-sm font-medium text-gray-600 border-t border-gray-100 pt-6">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-bold hover:underline">
                Masuk di sini
            </a>
        </div>
    </div>
</div>
@endsection