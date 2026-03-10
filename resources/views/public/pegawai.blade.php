@extends('layouts.public')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row gap-12">

    {{-- SIDEBAR PUBLIK --}}
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
                        <a href="{{ url('/pegawai') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-blue-50 text-blue-600 border border-blue-100 font-bold shadow-sm transition group">
                            <svg class="w-5 h-5 text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="font-bold">Struktur Pegawai</span>
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
                        <a href="{{ url('/program') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-50 hover:text-blue-600 transition group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <span class="font-medium">Program Kerja</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>

    {{-- KONTEN --}}
    <div class="flex-1">
        <div class="mb-10">
            <h1 class="text-4xl font-extrabold text-slate-800 mb-4 tracking-tight">
                Struktur Kepegawaian
            </h1>
            <p class="text-slate-500 text-lg leading-relaxed max-w-2xl">
                Dikelola oleh tenaga berdedikasi untuk memajukan literasi di Desa Cendil.
            </p>
        </div>

        {{-- AREA PEGAWAI --}}
        <div class="space-y-6 mb-16">
            
            {{-- KEPALA PERPUSTAKAAN (1 Kolom Full) --}}
            <div class="group bg-gradient-to-r from-blue-600 to-indigo-700 p-8 rounded-[2.5rem] shadow-xl shadow-blue-100 flex flex-col md:flex-row items-center gap-6 text-white border-2 border-transparent hover:border-blue-300 transition-all duration-300">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-3xl flex items-center justify-center shadow-inner group-hover:rotate-6 transition-transform">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                </div>
                <div class="text-center md:text-left">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-blue-200 mb-1">Pimpinan Utama</p>
                    <h3 class="text-3xl font-black mb-1">Eka Ria Lestari</h3>
                    <p class="text-blue-100 font-medium">Kepala Perpustakaan Pustaka Cendil</p>
                </div>
            </div>

            {{-- STAF LAINNYA (2 Kolom) --}}
            @php
                $staf = [
                    ['nama' => 'Dona Sri Agusta', 'jabatan' => 'Tata Usaha', 'type' => 'admin'],
                    ['nama' => 'Ayu Puspita Sari', 'jabatan' => 'Unit Teknis', 'type' => 'tech'],
                    ['nama' => 'Venty Erika, S.I.Pust', 'jabatan' => 'Unit Teknis', 'type' => 'tech'],
                    ['nama' => 'Jumiati', 'jabatan' => 'Unit Layanan TI', 'type' => 'it'],
                    ['nama' => 'Melli Astika', 'jabatan' => 'Unit Layanan TI', 'type' => 'it'],
                    ['nama' => 'Erine Aprianti', 'jabatan' => 'Unit Layanan Pemustaka', 'type' => 'service'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($staf as $s)
                <div class="group bg-white border border-slate-200 p-6 rounded-[2rem] shadow-sm hover:shadow-xl hover:border-blue-200 transition-all duration-300 flex items-center gap-5">
                    <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-inner">
                        @if($s['type'] == 'admin')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
                        @elseif($s['type'] == 'tech')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        @elseif($s['type'] == 'it')
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        @else
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        @endif
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 text-lg leading-tight group-hover:text-blue-600 transition-colors">
                            {{ $s['nama'] }}
                        </h3>
                        <p class="text-[10px] font-bold text-blue-500 uppercase tracking-widest mt-0.5">
                            {{ $s['jabatan'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- STATISTIK PENDIDIKAN --}}
        <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl shadow-blue-100">
            <div class="relative z-10">
                <h2 class="text-2xl font-bold mb-8 flex items-center gap-3">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                    Kualifikasi Pendidikan
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
                    <div class="p-6 bg-slate-800/50 rounded-3xl border border-slate-700">
                        <div class="text-4xl font-black text-blue-400 mb-1">5</div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500">SMA</p>
                    </div>
                    <div class="p-6 bg-slate-800/50 rounded-3xl border border-slate-700">
                        <div class="text-4xl font-black text-emerald-400 mb-1">1</div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Diploma</p>
                    </div>
                    <div class="p-6 bg-slate-800/50 rounded-3xl border border-slate-700">
                        <div class="text-4xl font-black text-indigo-400 mb-1">1</div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Sarjana (S1)</p>
                    </div>
                </div>
            </div>
            <svg class="absolute -right-20 -bottom-20 w-80 h-80 text-slate-800 opacity-30" fill="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z" /></svg>
        </div>
    </div>
</div>

@endsection