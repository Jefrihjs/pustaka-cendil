@extends('layouts.public')

@section('content')
{{-- Script Alpine.js untuk efek buka-tutup --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="max-w-7xl mx-auto px-6 py-12">
    
    {{-- Header Halaman --}}
    <div class="mb-16 text-center max-w-3xl mx-auto">
        <div class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 text-[10px] font-black rounded-full uppercase tracking-[0.3em] mb-4">
            Program Unggulan
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 mb-6 tracking-tight">
            Inovasi & <span class="text-blue-600 italic">Kreativitas</span>
        </h1>
        <p class="text-slate-500 text-lg leading-relaxed">
            Pustaka Cendil hadir dengan berbagai program unggulan yang dirancang inklusif untuk menyentuh seluruh lapisan masyarakat dan memberdayakan potensi Desa Cendil.
        </p>
    </div>

    {{-- Grid Kegiatan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20 items-start">
        
        @php
            $kegiatan = [
                [
                    'title' => 'KOLEKSI',
                    'sub' => 'Keluarga Melek Literasi',
                    'short_desc' => 'Pendampingan orang tua dalam membangun budaya baca keluarga dan memitigasi hoaks.',
                    'full_desc' => 'KOLEKSI merupakan kegiatan sosialisasi dan pendampingan kepada kepala keluarga dan orang tua agar memiliki kesadaran literasi yang baik. Program ini bertujuan menumbuhkan budaya membaca di lingkungan keluarga, meningkatkan kemampuan memilah informasi, serta membentengi masyarakat dari paparan berita bohong (hoaks). Melalui kegiatan ini, keluarga diharapkan menjadi garda terdepan dalam membangun generasi yang cerdas dan kritis.',
                    'color' => 'indigo',
                    'path' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'
                ],
                [
                    'title' => 'Festival Literasi',
                    'sub' => 'Gebyar Edukatif',
                    'short_desc' => 'Wadah apresiasi bakat melalui lomba bertutur, mewarnai, dan pemilihan Duta Baca.',
                    'full_desc' => 'Festival Literasi adalah agenda tahunan terbesar di Pustaka Cendil yang menjadi ajang selebrasi ilmu pengetahuan. Kegiatan ini mencakup berbagai perlombaan kreatif seperti lomba bertutur tingkat SD, lomba mewarnai untuk PAUD, hingga pemilihan Duta Baca Desa Cendil. Selain kompetisi, festival ini juga menampilkan pameran hasil karya UMKM lokal dan pertunjukan seni budaya masyarakat Cendil.',
                    'color' => 'amber',
                    'path' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z'
                ],
                [
                    'title' => '15 Menit Membaca',
                    'sub' => 'Habitual Reading',
                    'short_desc' => 'Gerakan membiasakan pengunjung membaca 15 menit sebelum beraktivitas.',
                    'full_desc' => 'Program "15 Menit Membaca" adalah gerakan disiplin diri untuk membangun kebiasaan membaca harian. Setiap pengunjung yang datang ke perpustakaan diajak untuk menyisihkan waktu 15 menit pertama guna membaca buku apa saja sebelum menggunakan fasilitas lain seperti internet atau area bermain. Gerakan ini terbukti efektif meningkatkan jumlah buku yang diselesaikan oleh pemustaka setiap bulannya.',
                    'color' => 'rose',
                    'path' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                ],
                [
                    'title' => 'Pojok Baca Kita',
                    'sub' => 'Literasi di Ruang Publik',
                    'short_desc' => 'Hadir di masjid, kantor desa, hingga area persawahan dengan akses digital.',
                    'full_desc' => 'Pojok Baca Kita adalah upaya jemput bola untuk mendekatkan buku ke aktivitas warga. Pustaka Cendil menyediakan rak buku mini dan akses barcode buku digital di titik-titik kumpul masyarakat seperti teras masjid, ruang tunggu kantor desa, pos kamling, bahkan gubuk tani di area persawahan. Literasi tidak lagi terbatas di dalam gedung, tapi menyatu dengan kehidupan sehari-hari.',
                    'color' => 'emerald',
                    'path' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z'
                ],
                [
                    'title' => 'ONE DAY ONE PR',
                    'sub' => 'Bimbingan Belajar',
                    'short_desc' => 'Pendampingan calistung dan tugas sekolah harian bagi siswa sekolah dasar.',
                    'full_desc' => 'Program pendampingan belajar harian bagi anak-anak usia sekolah di Desa Cendil. Relawan dan pengelola perpustakaan siap membantu siswa yang kesulitan mengerjakan PR atau memahami pelajaran sekolah. Fokus utama adalah pada literasi dasar (calistung) dan logika matematika, memastikan tidak ada anak Desa Cendil yang tertinggal dalam prestasi akademik karena kurangnya bimbingan di rumah.',
                    'color' => 'blue',
                    'path' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253'
                ],
                [
                    'title' => 'KATER',
                    'sub' => 'Kesenian Terampil',
                    'short_desc' => 'Pelatihan tari, kriya daur ulang, menjahit, hingga olahan pangan lokal.',
                    'full_desc' => 'KATER adalah implementasi dari transformasi perpustakaan berbasis inklusi sosial. Pustaka Cendil menyediakan ruang bagi warga untuk belajar keterampilan praktis (life skills). Kegiatannya meliputi latihan tari tradisional untuk remaja, pelatihan menjahit, kerajinan tangan dari barang bekas, hingga edukasi pengolahan pangan lokal yang memiliki nilai ekonomis bagi kelompok ibu-ibu (UPPKA).',
                    'color' => 'violet',
                    'path' => 'M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.828 2.828.99 3.182c.155.495-.125 1.013-.626 1.157l-3.52 1.01c-.486.14-.984-.132-1.127-.61l-1.01-3.52a1.003 1.003 0 01.626-1.157l3.182-.99L12 12z'
                ],
                [
                    'title' => 'PELETEK',
                    'sub' => 'Edukasi Teknologi',
                    'short_desc' => 'Bimbingan komputer dasar hingga mahir untuk kesiapan era digital.',
                    'full_desc' => 'Melalui PELETEK, Pustaka Cendil berusaha menghapus kesenjangan digital di desa. Kami menyediakan fasilitas komputer dan internet gratis serta bimbingan intensif bagi pemuda dan warga. Mulai dari pengenalan perangkat lunak perkantoran (Word/Excel), desain grafis dasar, hingga penggunaan internet sehat untuk menunjang pemasaran produk UMKM desa secara online.',
                    'color' => 'cyan',
                    'path' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                ],
                [
                    'title' => 'PENTOL PEDAS',
                    'sub' => 'Olah Lahan Pekarangan',
                    'short_desc' => 'Ketahanan pangan desa melalui budidaya sayuran di lahan perpustakaan.',
                    'full_desc' => 'PENTOL PEDAS adalah inovasi yang memadukan literasi dengan aksi nyata ketahanan pangan. Perpustakaan mengelola lahan seluas ±1 hektar untuk budidaya sayuran organik seperti sawi, kangkung, dan bayam. Warga diajak belajar teknik bertani modern melalui buku yang ada, lalu mempraktikkannya langsung di lahan. Hasil panen digunakan untuk kebutuhan warga dan menjadi contoh pemanfaatan pekarangan rumah.',
                    'color' => 'orange',
                    'path' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                ],
            ];
        @endphp

        @foreach($kegiatan as $k)
        <div x-data="{ open: false }" 
             @click="open = !open"
             class="group bg-white border border-slate-200 p-8 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 relative overflow-hidden cursor-pointer flex flex-col h-auto"
             :class="open ? 'ring-2 ring-{{ $k['color'] }}-500 shadow-2xl scale-[1.02] z-10' : 'hover:border-{{ $k['color'] }}-300'">
            
            {{-- Decoration --}}
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-{{ $k['color'] }}-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            {{-- Icon --}}
            <div class="w-14 h-14 bg-{{ $k['color'] }}-50 text-{{ $k['color'] }}-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-{{ $k['color'] }}-600 group-hover:text-white transition-all duration-300 shadow-inner"
                 :class="open ? 'bg-{{ $k['color'] }}-600 text-white' : ''">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $k['path'] }}" />
                </svg>
            </div>

            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-{{ $k['color'] }}-500 mb-2">{{ $k['sub'] }}</p>
            <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-{{ $k['color'] }}-700 transition-colors">{{ $k['title'] }}</h3>
            
            {{-- Teks Pendek --}}
            <p x-show="!open" class="text-slate-500 text-sm leading-relaxed">
                {{ $k['short_desc'] }}
            </p>

            {{-- Detail Panjang (Muncul saat diklik) --}}
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="mt-4 pt-4 border-t border-slate-100">
                <p class="text-slate-600 text-sm leading-relaxed text-justify antialiased">
                    {{ $k['full_desc'] }}
                </p>
                <div class="mt-6 flex items-center justify-center text-{{ $k['color'] }}-600 font-bold text-[10px] uppercase tracking-widest bg-{{ $k['color'] }}-50 py-2 rounded-full">
                    <span>Tutup Detail</span>
                    <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    {{-- Highlight PENTOL PEDAS --}}
    <div class="bg-slate-900 rounded-[3rem] p-10 lg:p-16 text-white relative overflow-hidden shadow-2xl">
        <div class="relative z-10 flex flex-col lg:flex-row gap-12 items-center">
            <div class="flex-1 text-center lg:text-left">
                <span class="px-4 py-1.5 bg-orange-500 text-[10px] font-black rounded-full uppercase tracking-widest">Ketahanan Pangan Unggulan</span>
                <h2 class="text-4xl md:text-5xl font-black mt-6 mb-6">PENTOL PEDAS</h2>
                <p class="text-slate-400 text-lg leading-relaxed mb-8">
                    Inovasi unggulan yang memanfaatkan lahan ±1 hektar di sekitar gedung perpustakaan untuk budidaya sayuran organik. Sebuah harmoni antara literasi buku dan ketahanan pangan nyata.
                </p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                    <div class="px-6 py-4 bg-white/5 rounded-2xl border border-white/10 text-center">
                        <p class="text-2xl font-bold text-orange-400">±1 Ha</p>
                        <p class="text-[10px] uppercase text-slate-500 font-bold tracking-widest">Luas Lahan</p>
                    </div>
                    <div class="px-6 py-4 bg-white/5 rounded-2xl border border-white/10 text-center">
                        <p class="text-2xl font-bold text-emerald-400">Organik</p>
                        <p class="text-[10px] uppercase text-slate-500 font-bold tracking-widest">Metode Tanam</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3">
                <div class="aspect-square bg-gradient-to-br from-orange-500 to-amber-600 rounded-[2.5rem] flex items-center justify-center shadow-3xl rotate-3">
                    <svg class="w-32 h-32 text-white/20" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 blur-[120px] rounded-full"></div>
    </div>

</div>
@endsection