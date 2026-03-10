@extends('layouts.public')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">
    
    {{-- Header Halaman --}}
    <div class="mb-16 text-center max-w-3xl mx-auto">
        <h1 class="text-4xl font-extrabold text-slate-800 mb-6 tracking-tight">
            Inovasi & <span class="text-blue-600 italic">Kreativitas</span>
        </h1>
        <p class="text-slate-500 text-lg leading-relaxed">
            Pustaka Cendil hadir dengan berbagai program unggulan yang dirancang inklusif untuk menyentuh seluruh lapisan masyarakat dan memberdayakan potensi Desa Cendil secara berkelanjutan.
        </p>
    </div>

    {{-- Grid Kegiatan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
        
        @php
            $kegiatan = [
                [
                    'title' => 'KOLEKSI',
                    'sub' => 'Keluarga Melek Literasi',
                    'desc' => 'Pendampingan orang tua dalam membangun budaya baca keluarga dan memitigasi hoaks.',
                    'color' => 'indigo',
                    'path' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'
                ],
                [
                    'title' => 'Festival Literasi',
                    'sub' => 'Gebyar Edukatif',
                    'desc' => 'Wadah apresiasi bakat melalui lomba bertutur, mewarnai, dan pemilihan Duta Baca.',
                    'color' => 'amber',
                    'path' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'
                ],
                [
                    'title' => '15 Menit Membaca',
                    'sub' => 'Habitual Reading',
                    'desc' => 'Gerakan membiasakan pengunjung membaca 15 menit sebelum beraktivitas di perpustakaan.',
                    'color' => 'rose',
                    'path' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                ],
                [
                    'title' => 'Pojok Baca Kita',
                    'sub' => 'Literasi di Ruang Publik',
                    'desc' => 'Hadir di masjid, kantor desa, hingga area persawahan dengan akses digital barcode.',
                    'color' => 'emerald',
                    'path' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'
                ],
                [
                    'title' => 'ONE DAY ONE PR',
                    'sub' => 'Bimbingan Belajar',
                    'desc' => 'Pendampingan calistung dan tugas sekolah harian bagi siswa sekolah dasar.',
                    'color' => 'blue',
                    'path' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253'
                ],
                [
                    'title' => 'KATER',
                    'sub' => 'Kesenian Terampil',
                    'desc' => 'Pelatihan tari, kriya daur ulang, menjahit, hingga olahan pangan lokal (UPPKA).',
                    'color' => 'violet',
                    'path' => 'M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.828 2.828.99 3.182c.155.495-.125 1.013-.626 1.157l-3.52 1.01c-.486.14-.984-.132-1.127-.61l-1.01-3.52a1.003 1.003 0 01.626-1.157l3.182-.99L12 12z'
                ],
                [
                    'title' => 'PELETEK',
                    'sub' => 'Edukasi Teknologi',
                    'desc' => 'Bimbingan komputer dasar hingga mahir untuk kesiapan menghadapi era digital.',
                    'color' => 'cyan',
                    'path' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                ],
                [
                    'title' => 'PENTOL PEDAS',
                    'sub' => 'Olah Lahan Pekarangan',
                    'desc' => 'Ketahanan pangan desa melalui budidaya sayuran di lahan perpustakaan seluas 1 Ha.',
                    'color' => 'orange',
                    'path' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                ],
            ];
        @endphp

        @foreach($kegiatan as $k)
        <div class="group bg-white border border-slate-200 p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:border-{{ $k['color'] }}-300 transition-all duration-300 relative overflow-hidden">
            {{-- Decoration --}}
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-{{ $k['color'] }}-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            {{-- Icon --}}
            <div class="w-14 h-14 bg-{{ $k['color'] }}-50 text-{{ $k['color'] }}-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-{{ $k['color'] }}-600 group-hover:text-white transition-all duration-300 shadow-inner">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $k['path'] }}" />
                </svg>
            </div>

            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-{{ $k['color'] }}-500 mb-2">{{ $k['sub'] }}</p>
            <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-{{ $k['color'] }}-700 transition-colors">{{ $k['title'] }}</h3>
            <p class="text-slate-500 text-sm leading-relaxed">{{ $k['desc'] }}</p>
        </div>
        @endforeach

    </div>

    {{-- Highlight PENTOL PEDAS (Special Case) --}}
    <div class="bg-slate-900 rounded-[3rem] p-10 lg:p-16 text-white relative overflow-hidden shadow-2xl">
        <div class="relative z-10 flex flex-col lg:flex-row gap-12 items-center">
            <div class="flex-1">
                <span class="px-4 py-1.5 bg-orange-500 text-[10px] font-black rounded-full uppercase tracking-widest">Ketahanan Pangan</span>
                <h2 class="text-4xl font-black mt-6 mb-6">PENTOL PEDAS</h2>
                <p class="text-slate-400 text-lg leading-relaxed mb-8">
                    Inovasi unggulan yang memanfaatkan lahan ±1 hektar di sekitar gedung perpustakaan untuk budidaya kangkung, sawi, bayam, dan jagung. Sebuah harmoni antara literasi dan ketahanan pangan.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="px-6 py-4 bg-white/5 rounded-2xl border border-white/10">
                        <p class="text-2xl font-bold text-orange-400">±1 Ha</p>
                        <p class="text-[10px] uppercase text-slate-500 font-bold">Luas Lahan</p>
                    </div>
                    <div class="px-6 py-4 bg-white/5 rounded-2xl border border-white/10">
                        <p class="text-2xl font-bold text-emerald-400">Organik</p>
                        <p class="text-[10px] uppercase text-slate-500 font-bold">Metode Tanam</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3">
                <div class="aspect-square bg-gradient-to-br from-orange-500 to-amber-600 rounded-[2.5rem] flex items-center justify-center shadow-3xl rotate-3 group">
                    <svg class="w-32 h-32 text-white/20 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
        {{-- Bg Decoration --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 blur-[120px] rounded-full"></div>
    </div>

</div>

@endsection