@extends('layouts.public')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row gap-12">

    {{-- SIDEBAR PUBLIK (DENGAN SVG) --}}
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
                        <a href="{{ url('/profil') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-blue-50 text-blue-600 border border-blue-100 font-bold shadow-sm transition group">
                            <svg class="w-5 h-5 text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-bold">Profil Singkat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pegawai') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-50 hover:text-blue-600 transition group">
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
        <div class="mb-12 bg-white border border-slate-200 rounded-[2rem] p-10 shadow-sm relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-4xl font-extrabold text-slate-800 mb-6 leading-tight">
                    Profil Perpustakaan <br><span class="text-blue-600">Desa Cendil</span>
                </h1>
                <p class="text-slate-600 text-lg leading-relaxed max-w-2xl">
                    Pustaka Cendil <strong class="text-slate-900">“TIGE KUBOK”</strong> merupakan pusat literasi desa yang menjadi denyut nadi pemberdayaan masyarakat di Kecamatan Kelapa Kampit, Belitung Timur.
                </p>
            </div>
            {{-- Dekorasi Ikon Background --}}
            <svg class="absolute -right-8 -bottom-8 w-64 h-64 text-slate-50 opacity-[0.5]" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            {{-- Visi --}}
            <div class="bg-blue-600 p-8 rounded-3xl text-white shadow-xl shadow-blue-100">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    Visi
                </h2>
                <p class="text-blue-50 leading-relaxed font-medium">
                    "Turut berperan aktif dalam proses mencerdaskan dan memberdayakan bangsa melalui perpustakaan."
                </p>
            </div>

            {{-- Misi --}}
            <div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-sm">
                <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                    Misi Utama
                </h2>
                <ul class="space-y-3 text-slate-600 text-sm">
                    <li class="flex gap-2"><span class="text-blue-600">●</span> Mengembangkan minat baca masyarakat</li>
                    <li class="flex gap-2"><span class="text-blue-600">●</span> Mendekatkan perpustakaan ke masyarakat</li>
                    <li class="flex gap-2"><span class="text-blue-600">●</span> Transformasi berbasis inklusi sosial</li>
                </ul>
            </div>
        </div>

        {{-- Identitas Tabel --}}
        <div class="bg-white border border-slate-200 rounded-[2rem] overflow-hidden shadow-sm mb-12">
            <div class="px-8 py-6 bg-slate-50 border-b border-slate-200">
                <h3 class="font-bold text-slate-800">Identitas Resmi</h3>
            </div>
            <div class="p-8 grid md:grid-cols-2 gap-x-12 gap-y-6">
                @php
                    $identitas = [
                        'Nama' => 'Pustaka Cendil “TIGE KUBOK”',
                        'Berdiri' => '28 Desember 2009',
                        'No SK' => '29/KPTS/XII/2009',
                        'Alamat' => 'Jl. Raya Sijuk, RT 006/002 Dusun Cendil',
                        'Kabupaten' => 'Belitung Timur',
                        'Kepala' => 'Eka Ria Lestari'
                    ];
                @endphp
                @foreach($identitas as $label => $isi)
                <div class="border-b border-slate-100 pb-2">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">{{ $label }}</p>
                    <p class="text-slate-700 font-semibold">{{ $isi }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Prestasi --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $prestasi = [
                    ['Juara 1 Provinsi', 'Tahun 2021 & 2025'],
                    ['Inklusi Sosial', 'Terbaik (2020–2022)'],
                    ['Inovasi Digital', 'Terbaik Desa (2025)']
                ];
            @endphp
            @foreach($prestasi as $item)
            <div class="bg-gradient-to-br from-white to-slate-50 border border-slate-200 p-6 rounded-3xl text-center shadow-sm">
                <div class="text-3xl mb-3">🏆</div>
                <h4 class="font-bold text-slate-800 text-sm mb-1">{{ $item[0] }}</h4>
                <p class="text-xs text-slate-500 font-medium">{{ $item[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection