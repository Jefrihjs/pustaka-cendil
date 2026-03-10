@extends('layouts.public')

@section('content')
{{-- 1. HERO CAROUSEL (BANNER BERANDA) --}}
<section class="relative h-[500px] md:h-[700px] bg-slate-900 overflow-hidden" 
    x-data="{ 
        activeSlide: 0, 
        slides: {{ $banners->count() }},
        next() { this.activeSlide = (this.activeSlide + 1) % this.slides },
        prev() { this.activeSlide = (this.activeSlide - 1 + this.slides) % this.slides },
        loop() { setInterval(() => { this.next() }, 5000) }
    }" 
    x-init="loop()">

    {{-- Item Slide --}}
    @foreach($banners as $index => $banner)
    <div x-show="activeSlide === {{ $index }}" 
         x-transition:enter="transition duration-1000 ease-out"
         x-transition:enter-start="opacity-0 scale-110"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition duration-1000 ease-in"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="absolute inset-0">
        
        {{-- Gambar Banner --}}
        <img src="{{ asset('storage/' . $banner->file_path) }}" 
             class="w-full h-full object-cover opacity-60 transition-transform duration-[5000ms]"
             :class="activeSlide === {{ $index }} ? 'scale-110' : 'scale-100'">

        {{-- Overlay Text --}}
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 flex items-center">
            <div class="container mx-auto px-6 lg:px-20">
                <div class="max-w-4xl">
                    <span class="inline-block px-4 py-1.5 bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-6 shadow-lg shadow-blue-600/30">Sorotan Utama</span>
                    <h2 class="text-4xl md:text-7xl font-black text-white leading-[1.1] mb-8 drop-shadow-2xl">
                        {{ $banner->caption }}
                    </h2>
                    <div class="flex gap-4">
                        <a href="{{ route('public.gallery.index') }}" class="px-8 py-4 bg-white text-slate-900 rounded-2xl font-black uppercase text-sm hover:bg-blue-600 hover:text-white transition-all shadow-xl active:scale-95">Lihat Galeri</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Navigasi Manual (Kiri-Kanan) --}}
    @if($banners->count() > 1)
    <div class="absolute inset-x-0 bottom-0 flex justify-between p-10 items-center z-20">
        {{-- Indicator Dots --}}
        <div class="flex gap-3">
            <template x-for="i in slides" :key="i">
                <button @click="activeSlide = i-1" 
                    :class="activeSlide === i-1 ? 'w-12 bg-blue-500' : 'w-3 bg-white/30 hover:bg-white/60'"
                    class="h-3 rounded-full transition-all duration-500"></button>
            </template>
        </div>
        
        <div class="flex gap-4">
            <button @click="prev()" class="p-4 bg-white/10 backdrop-blur-md text-white rounded-2xl hover:bg-white hover:text-slate-900 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button @click="next()" class="p-4 bg-white/10 backdrop-blur-md text-white rounded-2xl hover:bg-white hover:text-slate-900 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>
    @endif
</section>

{{-- 2. KONTEN BERITA (Gunakan kode Abang di bawah ini) --}}
<div class="bg-slate-50 py-16">
    ... (Lanjutannya isi grid berita yang Abang kirim tadi) ...
</div>
@endsection