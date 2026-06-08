<footer class="w-full mt-24 rounded-t-[40px] overflow-hidden" style="background-color: #3B2010; border-top: 3px solid #000;">

    {{-- Footer Top --}}
    <div class="px-margin-desktop py-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

        {{-- Brand --}}
        <div class="flex flex-col gap-4">
            <a href="#" class="text-h2 font-h1 uppercase tracking-tighter leading-none" style="color: #F8F5EF;">
                CIPA<span style="color: #D4A373;">M</span>ILK
            </a>
            <p class="text-body-md font-body-md leading-relaxed" style="color: #C4A882;">
                Sentra produk olahan susu segar dari peternak lokal Cipageran, Cimahi. Segar, alami, dan berkelanjutan.
            </p>
            <div class="flex gap-3 mt-2">
                @foreach (['f', 'ig', 'wa'] as $icon)
                <a href="#"
                   class="w-9 h-9 flex items-center justify-center rounded-full text-label-bold font-label-bold uppercase transition-colors"
                   style="border: 2px solid #6B4423; color: #C4A882;"
                   onmouseover="this.style.backgroundColor='#D4A373';this.style.borderColor='#D4A373';this.style.color='#3B2010'"
                   onmouseout="this.style.backgroundColor='transparent';this.style.borderColor='#6B4423';this.style.color='#C4A882'">
                    {{ $icon }}
                </a>
                @endforeach
            </div>
        </div>

        {{-- Produk --}}
        <div class="flex flex-col gap-4">
            <h4 class="text-label-bold font-label-bold uppercase tracking-widest" style="color: #F8F5EF;">Produk</h4>
            <ul class="flex flex-col gap-2">
                @foreach (['Susu Segar', 'Yogurt', 'Keju Lokal', 'Susu Pasteurisasi'] as $item)
                <li>
                    <a href="#" class="text-body-md font-body-md transition-colors"
                       style="color: #C4A882;"
                       onmouseover="this.style.color='#D4A373'"
                       onmouseout="this.style.color='#C4A882'">
                        {{ $item }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Informasi --}}
        <div class="flex flex-col gap-4">
            <h4 class="text-label-bold font-label-bold uppercase tracking-widest" style="color: #F8F5EF;">Informasi</h4>
            <ul class="flex flex-col gap-2">
                @foreach (['Tentang Kami', 'Cara Pesan', 'Galeri', 'Blog & Resep'] as $item)
                <li>
                    <a href="#" class="text-body-md font-body-md transition-colors"
                       style="color: #C4A882;"
                       onmouseover="this.style.color='#D4A373'"
                       onmouseout="this.style.color='#C4A882'">
                        {{ $item }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Kontak --}}
        <div class="flex flex-col gap-4">
            <h4 class="text-label-bold font-label-bold uppercase tracking-widest" style="color: #F8F5EF;">Kontak</h4>
            <ul class="flex flex-col gap-2">
                <li><a href="mailto:info@cipamilk.id" class="text-body-md font-body-md transition-colors" style="color: #C4A882;" onmouseover="this.style.color='#D4A373'" onmouseout="this.style.color='#C4A882'">info@cipamilk.id</a></li>
                <li><a href="tel:+622212345" class="text-body-md font-body-md transition-colors" style="color: #C4A882;" onmouseover="this.style.color='#D4A373'" onmouseout="this.style.color='#C4A882'">+62 22 1234-56</a></li>
                <li><span class="text-body-md font-body-md" style="color: #C4A882;">Cipageran, Cimahi Utara</span></li>
                <li><span class="text-body-md font-body-md" style="color: #C4A882;">Jawa Barat, Indonesia</span></li>
            </ul>
        </div>

    </div>

    {{-- Footer Bottom --}}
    <div class="px-margin-desktop py-5 flex flex-col sm:flex-row items-center justify-between gap-3" style="border-top: 1px solid #6B4423;">
        <span class="text-body-md font-body-md" style="color: #8B6B3D;">© 2026 CipaMilk. Kolaborasi KKN & UMKM Cimahi.</span>
        <div class="flex gap-6">
            <a href="#" class="text-body-md font-body-md transition-colors" style="color: #8B6B3D;" onmouseover="this.style.color='#D4A373'" onmouseout="this.style.color='#8B6B3D'">Kebijakan Privasi</a>
            <a href="#" class="text-body-md font-body-md transition-colors" style="color: #8B6B3D;" onmouseover="this.style.color='#D4A373'" onmouseout="this.style.color='#8B6B3D'">Syarat & Ketentuan</a>
        </div>
    </div>

</footer>