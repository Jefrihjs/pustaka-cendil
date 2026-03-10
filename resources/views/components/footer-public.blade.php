<footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            {{-- Kolom 1: Branding & Slogan --}}
            <div class="space-y-6">
                <div class="flex items-center gap-3 group">
                    {{-- Logo Diperkecil dengan Latar Putih --}}
                    <div class="bg-white p-1 rounded-lg shadow-sm border border-slate-700 flex-shrink-0">
                        <img src="{{ asset('images/logo-pustaka.png') }}" 
                            alt="Logo Pustaka Cendil" 
                            class="w-8 h-8 rounded-md object-cover">
                    </div>
                    
                    {{-- Teks Branding --}}
                    <div class="min-w-0">
                        <span class="text-lg font-black text-white tracking-tighter uppercase block leading-none">Pustaka Cendil</span>
                        <span class="text-[9px] text-blue-400 font-bold uppercase tracking-[0.2em] block mt-1">Tige Kubok</span>
                    </div>
                </div>
                
                <p class="text-sm leading-relaxed text-slate-400">
                    Pusat literasi dan inklusi sosial masyarakat Desa Cendil. Membangun peradaban cerdas melalui ketersediaan informasi.
                </p>
        
                <div class="flex gap-3 flex-wrap">
                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/perpustakaan.cendil" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#1877F2] text-slate-400 hover:text-white transition-all shadow-sm">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>

                    {{-- Instagram --}}
                    <a href="https://www.instagram.com/pustakacendil/" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#E4405F] text-slate-400 hover:text-white transition-all shadow-sm">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>

                    {{-- TikTok --}}
                    <a href="https://www.tiktok.com/@pustakacendil" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#000000] text-slate-400 hover:text-white transition-all shadow-sm">
                        <span class="sr-only">TikTok</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.03 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.9-.32-1.98-.23-2.81.36-.54.38-.89.98-1.03 1.64-.13.64.01 1.35.35 1.9.34.56.9.98 1.51 1.14.63.16 1.31.07 1.88-.23.63-.33 1.05-.98 1.17-1.68.11-.53.12-1.07.12-1.61-.03-5.52-.02-11.03-.03-16.55z"/></svg>
                    </a>

                    {{-- YouTube --}}
                    <a href="https://www.youtube.com/@perpusdescendil1233" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#FF0000] text-slate-400 hover:text-white transition-all shadow-sm">
                        <span class="sr-only">YouTube</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.377.505 9.377.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>

                    {{-- X (Twitter) --}}
                    <a href="https://x.com/perpusdes48933" target="_blank" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-[#000000] text-slate-400 hover:text-white transition-all shadow-sm">
                        <span class="sr-only">X (Twitter)</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932 6.064-6.933zm-1.292 19.49h2.039L6.486 3.24H4.298l13.311 17.403z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Kolom 2: Navigasi --}}
            <div class="lg:pl-10">
                <h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Akses Cepat</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="/profil" class="hover:text-blue-500 transition-colors">Profil Singkat</a></li>
                    <li><a href="/kegiatan" class="hover:text-blue-500 transition-colors">Program Inovasi</a></li>
                    <li><a href="/pegawai" class="hover:text-blue-500 transition-colors">Struktur Pegawai</a></li>
                    <li><a href="/koleksi" class="hover:text-blue-500 transition-colors">Katalog Koleksi</a></li>
                    <li><a href="/kontak" class="hover:text-blue-500 transition-colors">Lokasi & Kontak</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Layanan --}}
            <div>
                <h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Jam Layanan</h4>
                <ul class="space-y-4 text-sm">
                    {{-- Senin - Kamis --}}
                    <li class="flex flex-col group">
                        <span class="text-slate-500 text-[10px] uppercase font-bold tracking-tighter group-hover:text-amber-500 transition-colors">Senin - Kamis</span>
                        <div class="flex items-center gap-2">
                            <span class="text-slate-300">08:00 – 19:30 WIB</span>
                            <span class="text-[10px] bg-amber-900/30 text-amber-500 px-1.5 py-0.5 rounded border border-amber-900/50 font-bold">*</span>
                        </div>
                    </li>

                    {{-- Jumat - Sabtu --}}
                    <li class="flex flex-col group">
                        <span class="text-slate-500 text-[10px] uppercase font-bold tracking-tighter group-hover:text-blue-400 transition-colors">Jumat - Sabtu</span>
                        <span class="text-slate-300">08:00 – 16:00 WIB</span>
                    </li>

                    {{-- Status Libur --}}
                    <li class="pt-2 flex flex-col gap-2">
                        <div class="inline-flex items-center px-3 py-1 bg-red-900/30 text-red-400 text-[10px] rounded-full border border-red-900/50 w-fit">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                            Libur Nasional & Cuti Bersama Tutup
                        </div>
                        <p class="text-[9px] text-slate-500 italic leading-tight">
                            (*) Jam operasional dapat berubah sesuai permintaan pemustaka.
                        </p>
                    </li>
                </ul>
            </div>

            {{-- Kolom 4: Alamat & Peta --}}
            <div class="space-y-6">
                <h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Lokasi</h4>
                <div class="flex gap-4">
                    <svg class="w-6 h-6 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    <p class="text-sm leading-relaxed text-slate-400">
                        Jl. Raya Sijuk, RT 006/002 Dusun Cendil, Kelapa Kampit, Belitung Timur.
                    </p>
                </div>
                <div class="rounded-2xl overflow-hidden border border-slate-800 bg-slate-900 group transition-all duration-500 hover:border-blue-500/50 shadow-lg">
    {{-- Google Maps Thumb --}}
    <div class="grayscale group-hover:grayscale-0 transition-all duration-700 ease-in-out">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.343542713759!2d108.0287265!3d-2.859664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e19036f0e439569%3A0xc54817454226d9c4!2sPustaka%20Cendil%20Tige%20Kubok!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
            class="w-full h-20 border-0" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 text-center">
            <p>© 2026 Pustaka Cendil "Tige Kubok". All Rights Reserved.</p>
            <div class="flex gap-6">
                <span class="text-slate-600">Dikembangkan oleh <span class="text-blue-900">DiskominfoSP Belitung Timur</span></span>
            </div>
        </div>
    </div>
</footer>