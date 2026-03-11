@extends('layouts.public')

@section('navbar')
    @include('components.navbar-home')
@endsection

<style>
    .heroSwiper { height: 450px; }
    @media (min-width: 1024px) { .heroSwiper { height: 700px; } }
    .heroSwiper .swiper-slide img { filter: brightness(0.9); transition: transform 12s linear; }
    .heroSwiper .swiper-slide-active img { transform: scale(1.1); }
    .beritaSwiper { padding-bottom: 50px !important; }
    .swiper-pagination-bullet-active { background: #2563eb !important; }
</style>
<style>
    /* Paksa slide hanya setinggi konten di dalamnya */
    .beritaSwiper .swiper-slide {
        height: auto !important;
        display: flex;
        flex-direction: column;
    }

    /* Hilangkan padding bawaan swiper yang sering bikin gemuk */
    .beritaSwiper {
        padding-bottom: 5px !important;
    }

    /* Pastikan gambar nggak terlalu tinggi */
    .img-container {
        aspect-ratio: 16 / 9;
    }
</style>

@section('content')

{{-- 1. HERO SECTION --}}
<section class="relative overflow-hidden bg-slate-950">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            @forelse($banners as $banner)
            <div class="swiper-slide relative">
                <img src="{{ asset('storage/' . $banner->file_path) }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-transparent to-transparent z-10"></div>
            </div>
            @empty
            <div class="swiper-slide bg-slate-900 flex items-center justify-center">
                <h2 class="text-white font-black text-3xl italic tracking-widest">PUSTAKA CENDIL</h2>
            </div>
            @endforelse
        </div>
        <div class="swiper-pagination !bottom-8"></div>
    </div>

    {{-- Tombol Daftar Anggota --}}
    <div class="absolute bottom-12 right-6 lg:right-12 z-30 animate-bounce">
        <a href="{{ url('/daftar-anggota') }}" class="flex items-center gap-3 px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white rounded-2xl font-black shadow-2xl shadow-emerald-900/50 transition-all active:scale-95 group">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
            <span class="hidden md:inline">DAFTAR ANGGOTA</span>
        </a>
    </div>
</section>

{{-- 2. PENCAPAIAN --}}
<section class="max-w-7xl mx-auto px-6 -mt-12 relative z-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Mitra Program TPBIS --}}
        <div class="bg-white p-8 rounded-[2.5rem] shadow-xl border border-slate-100 flex flex-col items-center text-center gap-4 hover:-translate-y-2 transition-all">
            <div class="w-14 h-14 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15C15.3137 15 18 12.3137 18 9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9C6 12.3137 8.68629 15 12 15Z"/><path d="M8.21 13.89L7 21L12 18L17 21L15.79 13.88" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div>
                <h4 class="text-lg font-black text-slate-800 leading-tight">Mitra Program TPBIS</h4>
                <p class="text-sm font-medium text-slate-500 mt-2">Transportasi Perpustakaan Berbasis Inklusi Sosial</p>
            </div>
        </div>

        {{-- Akreditasi A --}}
        <div class="bg-white p-8 rounded-[2.5rem] shadow-xl border border-slate-100 flex flex-col items-center text-center gap-4 hover:-translate-y-2 transition-all">
            <div class="w-14 h-14 bg-yellow-50 text-yellow-500 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"/></svg>
            </div>
            <div>
                <h4 class="text-lg font-black text-slate-800 leading-tight">Akreditasi A (2025)</h4>
                <p class="text-sm font-medium text-slate-500 mt-2">Perpustakaan Nasional Republik Indonesia</p>
            </div>
        </div>

        {{-- Pilot Project --}}
        <div class="bg-white p-8 rounded-[2.5rem] shadow-xl border border-slate-100 flex flex-col items-center text-center gap-4 hover:-translate-y-2 transition-all">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div>
                <h4 class="text-lg font-black text-slate-800 leading-tight">Pilot Project Perpustakaan Desa</h4>
                <p class="text-sm font-medium text-slate-500 mt-2">Kabupaten Belitung Timur (2021–sekarang)</p>
            </div>
        </div>

    </div>
</section>

{{-- Bagian Berita & Survei --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-black text-slate-800 mb-10">Berita Terbaru</h2>

        <div class="swiper beritaSwiper">
    <div class="swiper-wrapper">
        @foreach($posts as $post)
        <div class="swiper-slide h-auto">
            {{-- Container Utama --}}
            <div class="flex flex-col h-full bg-white group pb-2">
                
                {{-- GAMBAR --}}
                <div class="aspect-video rounded-xl overflow-hidden mb-3 shadow-sm">
                    <img src="{{ asset('storage/' . ($post->images->first()->path ?? 'default.jpg')) }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <div class="flex flex-col px-1">
                    {{-- JUDUL --}}
                    <h3 class="text-base font-bold text-teal-900 leading-snug mb-1.5 line-clamp-2 hover:text-teal-700">
                        <a href="/berita/{{ $post->slug }}">{{ $post->judul }}</a>
                    </h3>
                    
                    {{-- INFO LOKASI --}}
                    <p class="text-[12px] text-slate-500 mb-0.5 font-medium">
                        {{ $post->lokasi ?? 'Manggar' }}
                    </p>
            
                    {{-- TANGGAL --}}
                    <span class="text-[11px] text-slate-400">
                        {{ $post->created_at->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, DD/MM/YYYY') }} |
                        {{ $post->created_at->timezone('Asia/Jakarta')->format('H:i') }} WIB
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-12 text-center">
        <a href="{{ route('public.posts.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-slate-100 text-slate-700 font-black rounded-2xl hover:bg-slate-50 hover:border-blue-200 hover:text-blue-600 transition-all group shadow-sm">
            Baca Berita Lainnya
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
    
    {{-- PAGINATION --}}
    <div class="swiper-pagination !static mt-4"></div>
</div>
    </div>
</section>

<section id="survei-section" class="max-w-7xl mx-auto px-6 py-20 mb-20 bg-slate-900 rounded-[3rem] shadow-2xl relative overflow-hidden">
    <div class="relative z-10 flex flex-col lg:flex-row gap-12 items-center">
        <div class="flex-1 text-center lg:text-left">
            <h2 class="text-4xl font-black text-white mb-4 italic uppercase tracking-tighter">Survei Kebutuhan</h2>
            <p class="text-slate-400 font-medium">Bantu kami mewujudkan layanan literasi terbaik untuk Desa Cendil.</p>
        </div>
        
        <div class="w-full lg:w-2/3">
            <form action="{{ route('survei.store') }}" method="POST" class="space-y-4">
                @csrf
                
                {{-- Baris 1: Nama --}}
                <input type="text" name="nama" placeholder="Nama Lengkap" required 
                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white text-sm outline-none focus:border-blue-500 transition-all">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Baris 2: Kategori (Enum di DB: Umum/Pelajar) --}}
                    <select name="kategori" required class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white text-sm outline-none">
                        <option value="Umum" class="text-slate-900">Umum</option>
                        <option value="Pelajar" class="text-slate-900">Pelajar</option>
                    </select>

                    {{-- Baris 2: Usia (INT di DB) --}}
                    <input type="number" name="usia" placeholder="Usia (Tahun)" required 
                        class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white text-sm outline-none">

                    {{-- Baris 2: Pendidikan (VARCHAR di DB) --}}
                    <input type="text" name="pendidikan" placeholder="Pendidikan (SD/SMP/SMA/S1)" required 
                        class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white text-sm outline-none">
                </div>

                {{-- Baris 3: Pekerjaan (VARCHAR di DB) --}}
                <input type="text" name="pekerjaan" placeholder="Pekerjaan Sekarang" required 
                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white text-sm outline-none">

                {{-- Baris 4: Subjek Disarankan (VARCHAR di DB - Ini Intinya) --}}
                <textarea name="subjek_disarankan" rows="2" placeholder="Subjek buku atau informasi apa yang Anda inginkan?" required 
                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white text-sm outline-none"></textarea>

                {{-- Baris 5: Saran (TEXT di DB - Boleh Null) --}}
                <textarea name="saran" rows="2" placeholder="Saran tambahan (Opsional)" 
                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white text-sm outline-none"></textarea>

                <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl font-black uppercase tracking-widest transition-all shadow-lg shadow-blue-900/20">
                    Kirim Masukan
                </button>
            </form>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var heroSwiper = new Swiper(".heroSwiper", { loop: true, effect: "fade", speed: 1000, autoplay: { delay: 6000 }, pagination: { el: ".swiper-pagination", clickable: true } });
    var beritaSwiper = new Swiper(".beritaSwiper", { slidesPerView: 1, spaceBetween: 24, pagination: { el: ".swiper-pagination", clickable: true }, breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } } });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".beritaSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 3, spaceBetween: 25 }
            }
        });
    });
</script>

@endpush