@extends('layouts.public')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row gap-12">

    {{-- SIDEBAR PUBLIK DENGAN SVG --}}
<aside class="w-full md:w-72 flex-shrink-0">
    <div class="sticky top-24">
        <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm">
            <div class="p-6 bg-slate-900">
                <h3 class="font-bold text-white text-lg flex items-center gap-3">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Tentang Kami
                </h3>
            </div>
            
            <ul class="p-4 space-y-2">
                <li>
                    <a href="{{ url('/profil') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-50 hover:text-blue-600 transition group">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Profil Singkat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pegawai') }}"class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-50 hover:text-blue-600 transition group">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-medium">Struktur Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/koleksi') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-50 hover:text-blue-600 transition group">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                        <span class="font-medium">Koleksi Buku</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/program') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-blue-50 text-blue-600 border border-blue-100 font-bold shadow-sm transition group">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span>Program Kerja</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>

    {{-- KONTEN --}}
    <div class="flex-1">
        <div class="mb-10 bg-white border border-slate-200 rounded-[2rem] p-8 shadow-sm">
            <h1 class="text-4xl font-extrabold text-slate-800 mb-4 tracking-tight leading-tight">
                Program Strategis <br><span class="text-blue-600 underline decoration-blue-100 underline-offset-8">Perpustakaan</span>
            </h1>
            <p class="text-slate-500 text-lg leading-relaxed">
                Rencana kerja Pustaka Cendil dalam mewujudkan masyarakat Desa Cendil yang cerdas dan literat melalui berbagai tahapan pengembangan.
            </p>
        </div>

        <div class="space-y-12">
            {{-- Program Jangka Pendek --}}
            <section>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-black shadow-lg shadow-indigo-200">01</div>
                    <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Program Jangka Pendek</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @php
                        $pendek = ['Pembenahan Administrasi', 'Pemilihan Duta Baca', 'Perpustakaan Keliling', 'Pelatihan Komputer', 'Lomba Mewarnai & Bercerita', 'Pelatihan UMKM'];
                    @endphp
                    @foreach($pendek as $p)
                    <div class="group bg-white border border-slate-200 p-5 rounded-2xl shadow-sm hover:border-blue-400 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-3 h-3 bg-blue-500 rounded-full group-hover:animate-ping"></div>
                            <span class="text-slate-700 font-semibold group-hover:text-blue-700 transition-colors">{{ $p }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- Program Jangka Menengah --}}
            <section>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-emerald-600 text-white rounded-2xl flex items-center justify-center font-black shadow-lg shadow-emerald-200">02</div>
                    <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Program Jangka Menengah</h2>
                </div>
                <div class="bg-gradient-to-br from-emerald-50 to-white rounded-[2rem] p-8 border border-emerald-100 shadow-sm">
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <li class="flex items-center gap-4 group">
                            <span class="flex-shrink-0 w-8 h-8 bg-white text-emerald-500 rounded-full flex items-center justify-center shadow-sm font-bold">✓</span>
                            <span class="text-slate-700 font-medium">Bimbingan belajar anak SD dan SMP</span>
                        </li>
                        <li class="flex items-center gap-4 group">
                            <span class="flex-shrink-0 w-8 h-8 bg-white text-emerald-500 rounded-full flex items-center justify-center shadow-sm font-bold">✓</span>
                            <span class="text-slate-700 font-medium">Pengadaan alat peraga dan inventaris</span>
                        </li>
                        <li class="flex items-center gap-4 group">
                            <span class="flex-shrink-0 w-8 h-8 bg-white text-emerald-500 rounded-full flex items-center justify-center shadow-sm font-bold">✓</span>
                            <span class="text-slate-700 font-medium">Kunjungan ke PAUD dan TPA</span>
                        </li>
                    </ul>
                </div>
            </section>

            {{-- Program Jangka Panjang --}}
            <section>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center font-black shadow-lg shadow-blue-200">03</div>
                    <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Program Jangka Panjang</h2>
                </div>
                <div class="space-y-4">
                    <div class="group flex items-start gap-6 p-8 bg-white border border-slate-200 rounded-[2rem] shadow-sm hover:shadow-2xl hover:border-blue-200 transition-all">
                        <div class="text-5xl text-slate-100 font-black group-hover:text-blue-50 transition-colors tracking-tighter">01</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-xl mb-1 group-hover:text-blue-600 transition-colors">Website & Otomasi</h4>
                            <p class="text-slate-500 leading-relaxed italic">Implementasi teknologi informasi melalui website resmi dan sistem otomasi sirkulasi perpustakaan mandiri.</p>
                        </div>
                    </div>
                    <div class="group flex items-start gap-6 p-8 bg-white border border-slate-200 rounded-[2rem] shadow-sm hover:shadow-2xl hover:border-blue-200 transition-all">
                        <div class="text-5xl text-slate-100 font-black group-hover:text-blue-50 transition-colors tracking-tighter">02</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-xl mb-1 group-hover:text-blue-600 transition-colors">Perluasan Gedung</h4>
                            <p class="text-slate-500 leading-relaxed italic">Meningkatkan kapasitas dan kenyamanan sarana fisik guna menampung volume kunjungan yang terus meningkat.</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

@endsection