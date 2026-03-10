@extends('layouts.public')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">
    
    {{-- Header Halaman --}}
    <div class="mb-16 text-center max-w-3xl mx-auto">
        <h1 class="text-4xl font-extrabold text-slate-800 mb-6 tracking-tight">
            Galeri <span class="text-blue-600 italic">Kegiatan</span>
        </h1>
        <p class="text-slate-500 text-lg leading-relaxed">
            Dokumentasi momen berharga dalam setiap langkah pemberdayaan masyarakat di Desa Cendil.
        </p>
    </div>

    {{-- Filter Kategori (Dekoratif) --}}
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <button class="px-6 py-2 bg-blue-600 text-white rounded-full text-xs font-bold uppercase tracking-widest shadow-lg shadow-blue-900/20">Semua</button>
        <button class="px-6 py-2 bg-white text-slate-600 border border-slate-200 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-slate-50">Literasi</button>
        <button class="px-6 py-2 bg-white text-slate-600 border border-slate-200 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-slate-50">Pentol Pedas</button>
        <button class="px-6 py-2 bg-white text-slate-600 border border-slate-200 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-slate-50">Kesenian</button>
    </div>

    {{-- Grid Galeri --}}
    <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6 mb-20">
        
        @php
            $photos = [
                ['title' => 'Lomba Mewarnai Anak', 'cat' => 'Literasi', 'aspect' => 'aspect-square'],
                ['title' => 'Panen Kangkung Pentol Pedas', 'cat' => 'Pertanian', 'aspect' => 'aspect-video'],
                ['title' => 'Bimbingan Belajar Siswa SD', 'cat' => 'Literasi', 'aspect' => 'aspect-[3/4]'],
                ['title' => 'Pelatihan Tari Tradisional', 'cat' => 'Kesenian', 'aspect' => 'aspect-square'],
                ['title' => 'Kegiatan Pojok Baca Masjid', 'cat' => 'Literasi', 'aspect' => 'aspect-video'],
                ['title' => 'Olah Lahan Jagung', 'cat' => 'Pertanian', 'aspect' => 'aspect-square'],
                ['title' => 'Pelatihan Komputer PELETEK', 'cat' => 'Teknologi', 'aspect' => 'aspect-[4/5]'],
                ['title' => 'Diskusi Melek Literasi Keluarga', 'cat' => 'Literasi', 'aspect' => 'aspect-video'],
            ];
        @endphp

        @foreach($photos as $p)
        <div class="relative group overflow-hidden rounded-[2rem] bg-slate-100 border border-slate-200 shadow-sm break-inside-avoid">
            {{-- Placeholder Image (Ganti src dengan path foto asli nanti) --}}
            <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&q=80&w=800" 
                 alt="{{ $p['title'] }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 {{ $p['aspect'] }}">
            
            {{-- Overlay Info --}}
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                <span class="text-blue-400 text-[10px] font-black uppercase tracking-widest mb-2">{{ $p['cat'] }}</span>
                <h3 class="text-white font-bold text-lg leading-tight">{{ $p['title'] }}</h3>
            </div>
            
            {{-- Badge Kategori (Visible) --}}
            <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-md px-3 py-1 rounded-full text-[10px] font-bold text-slate-800 uppercase shadow-sm group-hover:hidden transition-all">
                {{ $p['cat'] }}
            </div>
        </div>
        @endforeach

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
    @php
        $youtube_videos = [
            ['title' => 'Profil Pustaka Cendil', 'id' => 'VIDEO_ID_1'], // Ganti VIDEO_ID_1 dengan id video youtube
            ['title' => 'Panen Pentol Pedas', 'id' => 'VIDEO_ID_2'], // Ganti VIDEO_ID_2 dengan id video youtube
        ];
    @endphp

    @foreach($youtube_videos as $v)
    <div class="space-y-4">
            {{-- Container Video Responsive (16:9) --}}
            <div class="relative w-full pb-[56.25%] overflow-hidden rounded-[2.5rem] shadow-2xl border-4 border-slate-900 group">
                <iframe 
                    class="absolute top-0 left-0 w-full h-full group-hover:scale-105 transition-transform duration-700"
                    src="https://www.youtube.com/embed/{{ $v['id'] }}?rel=0" 
                    title="{{ $v['title'] }}" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="px-4">
                <h3 class="text-xl font-black text-slate-800">{{ $v['title'] }}</h3>
                <div class="flex items-center gap-2 mt-1">
                    <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">YouTube Dokumentasi</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- Ajakan Kontribusi --}}
    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-[3rem] p-12 text-white text-center shadow-2xl relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-3xl font-black mb-4">Ingin Foto Kegiatan Anda Ditampilkan?</h2>
            <p class="text-blue-100 mb-8 max-w-xl mx-auto italic">
                Punya dokumentasi saat mengikuti program Pustaka Cendil? Kirimkan kepada pustakawan kami untuk kami publikasikan di sini.
            </p>
            <a href="/kontak" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-blue-600 rounded-2xl font-bold hover:bg-blue-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                Hubungi Pustakawan
            </a>
        </div>
        {{-- Decoration --}}
        <div class="absolute -left-10 -bottom-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
    </div>

</div>

@endsection