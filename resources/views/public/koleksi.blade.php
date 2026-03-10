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
                        <a href="{{ url('/pegawai') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-600 hover:bg-slate-50 hover:text-blue-600 transition group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="font-medium">Struktur Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/koleksi') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-blue-50 text-blue-600 border border-blue-100 font-bold shadow-sm transition group">
                            <svg class="w-5 h-5 text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="font-bold">Koleksi Buku</span>
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
                Koleksi Perpustakaan
            </h1>
            <p class="text-slate-500 text-lg leading-relaxed max-w-2xl">
                Kami menyediakan ribuan literatur berkualitas untuk mendukung aktivitas belajar dan kreativitas seluruh masyarakat Desa Cendil.
            </p>
        </div>

        {{-- Highlight Jenis Koleksi (SVG VERSION) --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            @php
                $categories = [
                    ['Anak', 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['Agama', 'M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2z'],
                    ['Majalah', 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
                    ['E-Book', 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z']
                ];
            @endphp
            @foreach($categories as $cat)
            <div class="bg-white border border-slate-200 p-5 rounded-3xl text-center shadow-sm group hover:border-blue-500 transition-colors">
                <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-50 transition-colors">
                    <svg class="w-6 h-6 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $cat[1] }}" />
                    </svg>
                </div>
                <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">{{ $cat[0] }}</span>
            </div>
            @endforeach
        </div>

        {{-- Tabel Koleksi Modern --}}
        <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm">
            <div class="px-8 py-6 bg-slate-900 flex justify-between items-center">
                <h3 class="font-bold text-white tracking-wide flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 00-2 2h-2a2 2 0 00-2-2z" />
                    </svg>
                    Jumlah Koleksi Per Tahun
                </h3>
                <span class="px-3 py-1 bg-blue-600 text-[10px] font-black text-white rounded-full uppercase tracking-widest">Update 2024</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-8 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Tahun Terdata</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Total Koleksi</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-slate-400 uppercase tracking-widest">Status Pertumbuhan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                            $data = [
                                ['2019', '2.510'],
                                ['2020', '2.510'],
                                ['2021', '2.628'],
                                ['2022', '3.702'],
                                ['2023', '3.925'],
                                ['2024', '6.061'],
                            ];
                        @endphp
                        @foreach($data as $row)
                        <tr class="hover:bg-blue-50/30 transition-colors group">
                            <td class="px-8 py-5 font-bold text-slate-700">{{ $row[0] }}</td>
                            <td class="px-8 py-5">
                                <span class="text-lg font-black text-slate-800">{{ $row[1] }}</span>
                                <span class="text-xs text-slate-400 font-medium ml-1 tracking-tighter">Eksemplar</span>
                            </td>
                            <td class="px-8 py-5">
                                @if($row[0] == '2024')
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-xl text-[10px] font-black bg-green-100 text-green-700 border border-green-200">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-ping"></span>
                                        LONJAKAN SIGNIFIKAN
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-xl text-[10px] font-bold bg-slate-100 text-slate-500">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                        TERDATA
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-6 bg-slate-50 border-t border-slate-100">
                <p class="text-sm text-slate-500 italic flex items-center gap-3">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Statistik menunjukkan optimasi koleksi meningkat drastis sebesar 54% dalam satu tahun terakhir.
                </p>
            </div>
        </div>

        {{-- Footer Banner (SVG ICON) --}}
        <div class="mt-12 p-10 bg-gradient-to-br from-slate-900 to-indigo-950 rounded-[2.5rem] text-white shadow-2xl relative overflow-hidden">
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="max-w-md">
                    <h4 class="text-2xl font-bold mb-3 tracking-tight">Cari Buku Lebih Mudah?</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">Silakan datang langsung ke lokasi kami untuk konsultasi dengan pustakawan atau mencari buku melalui sistem OPAC di tempat.</p>
                </div>
                <div class="flex items-center gap-4 bg-white/5 backdrop-blur-xl p-4 rounded-3xl border border-white/10">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-blue-400 uppercase tracking-widest">Lokasi Kami</p>
                        <p class="text-sm font-bold">Desa Cendil, Belitung Timur</p>
                    </div>
                </div>
            </div>
            {{-- Decoration --}}
            <svg class="absolute -right-10 -bottom-10 w-64 h-64 text-white/5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
    </div>

</div>

@endsection