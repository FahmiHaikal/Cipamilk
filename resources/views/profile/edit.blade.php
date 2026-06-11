@extends('layouts.app')

@section('title', 'Profil Akun - Super Susu Cipageran')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 md:mt-12 mb-20">
    
    <nav class="flex text-sm text-gray-500 font-medium mb-8">
        <a href="{{ url('/') }}" class="hover:text-green-600 transition-colors">Beranda</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">Pengaturan Profil</span>
    </nav>

    <!-- Header Profil (Kartu Identitas) -->
    <div class="bg-green-600 rounded-[2rem] p-8 md:p-12 text-white shadow-lg relative overflow-hidden mb-10 flex flex-col md:flex-row items-center gap-6 md:gap-8 text-center md:text-left">
        <!-- Dekorasi Latar -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-green-500 rounded-full opacity-50 blur-2xl"></div>
        
        <!-- Foto Profil Ekstra Besar -->
        <div class="relative z-10 w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden border-4 border-white shadow-md flex-shrink-0 bg-white">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=fff&color=16a34a&size=200&bold=true" alt="Avatar Profil" class="w-full h-full object-cover">
        </div>

        <!-- Detail User -->
        <div class="relative z-10">
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-2">{{ Auth::user()->name }}</h1>
            <p class="text-green-100 flex items-center justify-center md:justify-start gap-2 text-sm md:text-base font-medium mb-4">
                <span class="material-symbols-outlined text-sm">mail</span> {{ Auth::user()->email }}
            </p>
            
            <!-- Label Role -->
            <div class="inline-block px-4 py-1.5 bg-green-800 text-white text-xs font-bold rounded-full uppercase tracking-widest shadow-inner">
                Akun: {{ Auth::user()->role }}
            </div>
        </div>
    </div>

    <!-- Bagian Formulir Pengaturan -->
    <div class="space-y-8">
        
        <!-- Form Update Informasi Profil -->
        <div class="p-8 md:p-10 bg-white shadow-sm border border-gray-100 rounded-[2rem] hover:shadow-md transition-shadow">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Form Update Password -->
        <div class="p-8 md:p-10 bg-white shadow-sm border border-gray-100 rounded-[2rem] hover:shadow-md transition-shadow">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Form Hapus Akun -->
        <div class="p-8 md:p-10 bg-red-50 shadow-sm border border-red-100 rounded-[2rem] hover:shadow-md transition-shadow">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection