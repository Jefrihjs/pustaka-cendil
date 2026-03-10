@extends('layouts.public')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">
    
    {{-- Header Halaman --}}
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-slate-800 mb-4 tracking-tight"> Hubungi Kami </h1>
        <p class="text-slate-500 text-lg max-w-2xl mx-auto">
            Punya pertanyaan seputar keanggotaan atau koleksi buku? Kami siap membantu meningkatkan literasi Anda.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        {{-- Info Kontak (Kiri) --}}
        <div class="space-y-6">
            {{-- Card Alamat --}}
            <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm hover:shadow-xl transition-all group">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-bold text-slate-800 text-xl mb-2">Lokasi</h3>
                <p class="text-slate-600 leading-relaxed text-sm">
                    Jl. Raya Sijuk, RT 006/002 Dusun Cendil, <br>
                    Kec. Kelapa Kampit, Kab. Belitung Timur, <br>
                    Kepulauan Bangka Belitung.
                </p>
            </div>

            {{-- Card Jam Operasional --}}
           <div class="bg-slate-900 p-8 rounded-[2rem] text-white shadow-xl shadow-blue-900/10 border border-slate-800">
                <div class="w-12 h-12 bg-blue-500/10 rounded-2xl flex items-center justify-center mb-6 border border-blue-500/20">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-6 italic tracking-tighter uppercase">Waktu Operasional</h3>
                
                <ul class="space-y-4 text-sm text-slate-400">
                    {{-- Senin - Kamis --}}
                    <li class="flex justify-between items-center border-b border-slate-800 pb-3">
                        <span class="font-medium">Senin - Kamis</span>
                        <div class="text-right">
                            <span class="text-white font-bold block text-base">08:00 - 19:30</span>
                            <span class="text-[9px] text-amber-500 font-bold uppercase tracking-widest">* Sesuai Permintaan</span>
                        </div>
                    </li>

                    {{-- Jumat - Sabtu --}}
                    <li class="flex justify-between items-center border-b border-slate-800 pb-3">
                        <span class="font-medium">Jumat - Sabtu</span>
                        <span class="text-white font-bold text-base">08:00 - 16:00</span>
                    </li>

                    {{-- Hari Libur --}}
                    <li class="flex justify-between items-center pt-2">
                        <span class="font-medium text-rose-400">Minggu & Libur Nasional</span>
                        <span class="px-2 py-1 bg-rose-500/10 text-rose-500 text-[10px] font-bold rounded uppercase">Tutup</span>
                    </li>
                </ul>

                <div class="mt-8 p-4 bg-white/5 rounded-2xl border border-white/5">
                    <p class="text-[11px] text-slate-400 leading-relaxed italic">
                        Pustaka Cendil siap melayani di luar jam operasional untuk kegiatan komunitas atau permintaan khusus dari pemustaka.
                    </p>
                </div>
            </div>
            
            {{-- Tombol WA --}}
            <a href="https://wa.me/628123456789" class="flex items-center justify-between p-6 bg-emerald-500 hover:bg-emerald-600 text-white rounded-[2rem] transition-all shadow-lg shadow-emerald-200 group">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    </div>
                    <span class="font-bold">WhatsApp Kami</span>
                </div>
                <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        {{-- Google Maps (Kanan) --}}
        <div class="lg:col-span-2">
            <div class="bg-white p-4 rounded-[2.5rem] border border-slate-200 shadow-sm h-full min-h-[500px]">
                {{-- Map Lokasi Pustaka Cendil Tige Kubok --}}
                <iframe 
                    class="w-full h-full rounded-[2rem] border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.462407430935!2d107.93688657472832!3d-2.6775659973000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e173772621e7863%3A0xadc55d724fa87e33!2sPerpustakaan%20Desa%20Cendil!5e0!3m2!1sid!2sid!4v1773130480876!5m2!1sid!2sid" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>

</div>

@endsection