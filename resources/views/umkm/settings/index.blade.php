@extends('layouts.umkm')

@section('title', 'Pengaturan - UMKM')

@section('content')

<div class="umkm-page-header umkm-fade umkm-fade--2">
    <h1>Pengaturan</h1>
    <p>Kelola profil dan preferensi akun UMKM Anda</p>
</div>

<div class="umkm-settings umkm-fade umkm-fade--3">

    {{-- Side Menu --}}
    <div class="umkm-settings__menu">
        <button class="umkm-settings__tab active" onclick="switchTab('profil', this)">
            🏢 Profil UMKM
        </button>
        <button class="umkm-settings__tab" onclick="switchTab('akun', this)">
            👤 Akun
        </button>
    </div>

    {{-- Panels --}}
    <div>

        {{-- Profil UMKM --}}
        <div id="profil" class="umkm-settings__panel active">
            <div class="umkm-card">
                <div class="umkm-card__head">
                    🏢 Profil UMKM
                    <p style="font-size:13px;font-weight:400;color:var(--gray-text);margin-top:2px;">
                        Perbarui informasi profil bisnis Anda
                    </p>
                </div>
                <form method="POST" action="{{ route('settings.profile') }}" class="umkm-card__body">
                    @csrf
                    @method('PUT')

                    <div class="umkm-form-row">
                        <div class="umkm-form-group">
                            <label class="umkm-label" for="nama_umkm">Nama UMKM *</label>
                            <input class="umkm-input" type="text" id="nama_umkm" name="nama_umkm"
                                   value="{{ $umkm->nama_umkm }}"
                                   placeholder="Contoh: UMKM Cipageran Jaya" required>
                        </div>
                        <div class="umkm-form-group">
                            <label class="umkm-label" for="pemilik">Nama Pemilik *</label>
                            <input class="umkm-input" type="text" id="pemilik" name="pemilik"
                                   value="{{ $umkm->pemilik }}"
                                   placeholder="Contoh: Budi Santoso" required>
                        </div>
                    </div>

                    <div class="umkm-form-group">
                        <label class="umkm-label" for="whatsapp">Nomor WhatsApp *</label>
                        <input class="umkm-input" type="text" id="whatsapp" name="whatsapp"
                               value="{{ $umkm->whatsapp }}"
                               placeholder="Contoh: 62812345678" required>
                    </div>

                    <div class="umkm-form-group">
                        <label class="umkm-label" for="alamat">Alamat Lengkap</label>
                        <textarea class="umkm-textarea" id="alamat" name="alamat"
                                  placeholder="Masukkan alamat lengkap UMKM Anda...">{{ $umkm->alamat }}</textarea>
                    </div>

                    <div class="umkm-form-group">
                        <label class="umkm-label" for="story">Cerita UMKM</label>
                        <textarea class="umkm-textarea" id="story" name="story"
                                  placeholder="Ceritakan kisah, visi, dan misi UMKM Anda...">{{ $umkm->story }}</textarea>
                    </div>

                    <div class="umkm-form-actions">
                        <button type="submit" class="umkm-btn umkm-btn--primary">💾 Simpan Profil</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Akun --}}
        <div id="akun" class="umkm-settings__panel">
            <div class="umkm-card">
                <div class="umkm-card__head">
                    👤 Akun
                    <p style="font-size:13px;font-weight:400;color:var(--gray-text);margin-top:2px;">
                        Perbarui informasi dan keamanan akun Anda
                    </p>
                </div>
                <form method="POST" action="{{ route('settings.account') }}" class="umkm-card__body">
                    @csrf
                    @method('PUT')

                    <div class="umkm-alert umkm-alert--info">ℹ️ Informasi akun login Anda</div>

                    <div class="umkm-form-row">
                        <div class="umkm-form-group">
                            <label class="umkm-label" for="name">Nama Lengkap *</label>
                            <input class="umkm-input" type="text" id="name" name="name"
                                   value="{{ auth()->user()->name }}"
                                   placeholder="Contoh: Budi Santoso" required>
                        </div>
                        <div class="umkm-form-group">
                            <label class="umkm-label" for="email">Email *</label>
                            <input class="umkm-input" type="email" id="email" name="email"
                                   value="{{ auth()->user()->email }}"
                                   placeholder="Contoh: budi@email.com" required>
                        </div>
                    </div>

                    <hr class="umkm-divider">

                    <p style="font-weight:600;margin-bottom:4px;">🔒 Ubah Password</p>
                    <p style="font-size:13px;color:var(--gray-text);margin-bottom:20px;">
                        Kosongkan jika tidak ingin mengubah password
                    </p>

                    <div class="umkm-form-row">
                        <div class="umkm-form-group">
                            <label class="umkm-label" for="password">Password Baru</label>
                            <input class="umkm-input" type="password" id="password" name="password"
                                   placeholder="Minimal 8 karakter">
                        </div>
                        <div class="umkm-form-group">
                            <label class="umkm-label" for="password_confirmation">Konfirmasi Password</label>
                            <input class="umkm-input" type="password" id="password_confirmation"
                                   name="password_confirmation" placeholder="Ulangi password baru">
                        </div>
                    </div>

                    <div class="umkm-form-actions">
                        <button type="submit" class="umkm-btn umkm-btn--primary">💾 Update Akun</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    function switchTab(name, btn) {
        document.querySelectorAll('.umkm-settings__panel').forEach(p => p.classList.remove('active'));
        document.querySelectorAll('.umkm-settings__tab').forEach(t => t.classList.remove('active'));
        document.getElementById(name).classList.add('active');
        btn.classList.add('active');
    }
</script>
@endpush