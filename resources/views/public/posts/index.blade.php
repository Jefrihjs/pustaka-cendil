@extends('layouts.public')

@section('content')
<div class="bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-6 py-16">
        
        {{-- Header Halaman --}}
        <div class="mb-16 text-center lg:text-left flex flex-col lg:flex-row lg:items-end justify-between gap-6 border-b border-slate-200 pb-12">
            <div>
                <div class="inline-block px-4 py-1.5 bg-rose-50 text-rose-600 text-[10px] font-black rounded-full uppercase tracking-[0.3em] mb-4">
                    Pustaka Cendil Update
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tight">
                    Arsip <span class="text-rose-600">Berita</span> & Kegiatan
                </h1>
                <p class="mt-4 text-slate-500 text-lg max-w-2xl font-medium leading-relaxed">
                    Menyajikan jejak langkah, inovasi, dan dokumentasi seluruh aktivitas Pustaka Cendil Tige Kubok untuk masyarakat.
                </p>
            </div>
            
            {{-- Search Bar Sederhana --}}
            <div class="relative w-full lg:w-96">
                <input type="text" placeholder="Cari berita..." class="w-full bg-white border-2 border-slate-100 rounded-2xl py-4 px-6 outline-none focus:border-rose-500 transition-all shadow-sm font-medium">
                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>
        </div>

        {{-- Grid Berita --}}
        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($posts as $post)
            <div class="group bg-white rounded-[2.5rem] border border-slate-200 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col">
                
                {{-- Foto Berita --}}
                <div class="aspect-[4/3] overflow-hidden relative bg-slate-100">
                     {{ $post->gambar }}
                   @if($post->images->first())
                    <img src="{{ asset('storage/'.$post->images->first()->path) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        alt="{{ $post->judul }}">
                    @else
                    <img src="{{ asset('images/logo-pustaka.png') }}"
                        class="w-full h-full object-cover">
                    @endif

                    <div class="absolute top-6 left-6">
                        <span class="px-4 py-2 bg-white/90 backdrop-blur-md text-[10px] font-black rounded-xl uppercase tracking-widest text-slate-800 shadow-xl">
                            {{ $post->created_at->timezone('Asia/Jakarta')->translatedFormat('d M Y') }} |
                            {{ $post->created_at->timezone('Asia/Jakarta')->format('H:i') }} WIB
                        </span>
                    </div>
                </div>

                {{-- Konten --}}
                <div class="p-8 flex flex-col flex-1">
                    {{-- Ganti title ke judul --}}
                    <h3 class="text-xl font-bold text-slate-800 mb-4 group-hover:text-rose-600 transition-colors line-clamp-2 leading-snug">
                        {{ $post->judul }}
                    </h3>
                    {{-- Ganti content ke konten --}}
                    <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3 font-medium">
                        {{ Str::limit(strip_tags($post->konten), 120) }}
                    </p>
                    
                    <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                        <a href="{{ route('public.posts.show', $post->slug) }}" class="inline-flex items-center gap-2 text-rose-600 font-black text-[10px] uppercase tracking-[0.2em] group/btn">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 group-hover/btn:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-20 flex justify-center custom-pagination">
            {{ $posts->links() }}
        </div>

        @else
        {{-- Jika Berita Kosong --}}
        <div class="py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
            <div class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
            <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">Belum ada berita yang diterbitkan.</p>
        </div>
        @endif
    </div>
</div>

{{-- Tambahkan Style CSS Khusus Pagination --}}
<style>
    .custom-pagination nav svg { width: 24px; }
    .custom-pagination nav div:first-child { display: none; } /* Sembunyikan text showing result di mobile */
    .custom-pagination nav span, .custom-pagination nav a {
        border-radius: 12px !important;
        margin: 0 4px !important;
        border: none !important;
        font-weight: 800 !important;
        padding: 10px 18px !important;
    }
</style>
@endsection