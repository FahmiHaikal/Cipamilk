@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-16 px-4 text-center">
    <div class="bg-white p-8 rounded-[2rem] border-[3px] border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <h2 class="text-2xl font-h1 uppercase mb-4">Verifikasi Email</h2>
        <p class="text-sm mb-6">Terima kasih telah mendaftar! Cek email Anda untuk link verifikasi.</p>
        
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full bg-green-600 text-white font-label-bold uppercase py-4 rounded-xl border-[3px] border-black">Kirim Ulang Email</button>
        </form>
    </div>
</div>
@endsection