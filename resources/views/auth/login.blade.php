@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-16 px-4">
    <div class="bg-white p-8 rounded-[2rem] border-[3px] border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <h2 class="text-3xl font-h1 uppercase mb-6 text-center">Masuk Akun</h2>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            
            <!-- Input Email -->
            <div>
                <label class="font-label-bold uppercase text-sm">Email</label>
                <!-- Tambahkan value="{{ old('email') }}" agar email tidak hilang saat gagal login -->
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full mt-1 p-3 border-[3px] border-black rounded-xl focus:border-green-600 focus:ring-0 transition-colors" required autofocus>
                
                <!-- Menampilkan Pesan Error Email -->
                @error('email')
                    <p class="text-red-500 text-xs font-bold mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Input Password -->
            <div>
                <label class="font-label-bold uppercase text-sm">Password</label>
                <input type="password" name="password" 
                    class="w-full mt-1 p-3 border-[3px] border-black rounded-xl focus:border-green-600 focus:ring-0 transition-colors" required>
                
                <!-- Menampilkan Pesan Error Password -->
                @error('password')
                    <p class="text-red-500 text-xs font-bold mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lupa Password & Ingat Saya -->
            <div class="flex items-center justify-between mt-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                    <span class="ms-2 text-sm text-gray-600 font-medium">Ingat Saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-bold text-gray-500 hover:text-green-600 transition-colors">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full mt-4 bg-green-600 text-white font-label-bold uppercase py-4 rounded-xl border-[3px] border-black shadow-[4px_4px_0px_0px_#000] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all">
                Masuk Sekarang
            </button>
        </form>

        <!-- Tambahan Link Register (Opsional untuk UX yang baik) -->
        <div class="mt-8 text-center text-sm font-medium text-gray-600 border-t border-gray-100 pt-6">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-green-600 hover:text-green-700 font-bold hover:underline">
                Daftar di sini
            </a>
        </div>
    </div>
</div>
@endsection