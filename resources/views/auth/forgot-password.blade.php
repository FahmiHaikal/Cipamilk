@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-16 px-4">
    <div class="bg-white p-8 rounded-[2rem] border-[3px] border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <h2 class="text-2xl font-h1 uppercase mb-4">Lupa Password</h2>
        <p class="text-sm mb-6">Masukkan email Anda, kami akan kirimkan tautan untuk reset password.</p>
        
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email Anda" class="w-full p-3 border-[3px] border-black rounded-xl" required>
            <button type="submit" class="w-full bg-black text-white font-label-bold uppercase py-4 rounded-xl">Kirim Tautan</button>
        </form>
    </div>
</div>
@endsection