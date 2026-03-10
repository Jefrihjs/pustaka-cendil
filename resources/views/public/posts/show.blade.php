@extends('layouts.public')

@section('content')
<article class="max-w-4xl mx-auto px-6 py-16">
    
    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-8">
        <a href="/" class="hover:text-blue-600 transition-colors">Beranda</a>
        <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-slate-300">Berita</span>
    </nav>

    {{-- Judul & Meta Data --}}
    <header class="mb-12">
        <h1 class="text-4xl md:text-5xl font-black text-slate-800 leading-tight mb-6">
            {{ $post->judul }}
        </h1>
        <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 font-medium">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/></svg>
                </div>
                <span class="text-slate-700 font-bold">
                    {{ $post->user->name ?? 'Admin Pustaka' }}
                </span>
            </div>
            <span class="hidden md:block w-1.5 h-1.5 bg-slate-200 rounded-full"></span>
            <time class="flex items-center gap-2">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $post->created_at->translatedFormat('d F Y') }} | {{ $post->created_at->format('H:i') }} WIB
            </time>
        </div>
    </header>

    {{-- SLIDER FOTO UTAMA --}}
    @if($post->images && $post->images->count() > 0)
    <div class="relative mb-16 group">
        <div class="swiper postGallery rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white bg-slate-50">
            <div class="swiper-wrapper">
                @foreach($post->images as $image)
                <div class="swiper-slide aspect-video">
                    <img src="{{ asset('storage/' . $image->path) }}" 
                         alt="{{ $post->judul }}" 
                         class="w-full h-full object-cover">
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next !text-white !w-12 !h-12 bg-black/20 backdrop-blur-md rounded-full after:!text-sm opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="swiper-button-prev !text-white !w-12 !h-12 bg-black/20 backdrop-blur-md rounded-full after:!text-sm opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @endif

    {{-- ISI BERITA UTAMA --}}
    <div class="isi-berita">
        <div class="entry-content text-slate-700">
            @if($post->lokasi)
                {{-- Lokasi --}}
                <span class="dateline-koran">
                    <strong>{{ $post->lokasi }}</strong> 
                    <span class="separator">—</span>
                </span>
            @endif
            
            {!! nl2br(e($post->konten)) !!}
        </div>
    </div>

    {{-- FOOTER --}}
    <footer class="mt-20 pt-10 border-t border-slate-100">
        <div class="flex flex-wrap items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <span class="text-xs font-black text-slate-400 uppercase tracking-widest">Bagikan:</span>
                <div class="flex gap-2">
                    <a href="https://wa.me/?text={{ urlencode($post->judul . ' ' . url()->current()) }}" target="_blank" class="w-10 h-10 bg-[#25D366] text-white rounded-xl flex items-center justify-center hover:scale-110 transition-transform shadow-lg shadow-emerald-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.445 0 .01 5.437 0 12.045c0 2.112.552 4.174 1.598 6.018L0 24l6.12-1.605a11.793 11.793 0 005.915 1.586h.005c6.602 0 12.038-5.437 12.043-12.048a11.82 11.82 0 00-3.526-8.412z"/></svg>
                    </a>
                </div>
            </div>
            <a href="/" class="px-8 py-3 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all text-sm border border-slate-200">
                Kembali ke Beranda
            </a>
        </div>
    </footer>
</article>

<style>

/* kontainer artikel */
.entry-content {
    font-size: 1.125rem; /* Ukuran sedikit diperbesar biar gak capek bacanya */
    line-height: 1.8;    /* Spasi baris lebih lega */
    color: #334155;
    text-align: justify; /* KUNCI: Rata kanan-kiri */
    text-justify: inter-word; /* Biar spasi antar kata lebih rapi */
}

/* Paksa paragraf untuk justify */
.entry-content p {
    margin-bottom: 1.5rem;
    display: block;

/* paksa jarak antar semua elemen */
.entry-content > *{
    margin-top:1.4rem;
    margin-bottom:1.4rem;
}

/* elemen pertama jangan terlalu turun */
.entry-content > *:first-child{
    margin-top:0;
}

/* paragraf */
.entry-content p{
    display:block;
}

/* list */
.entry-content ul,
.entry-content ol{
    padding-left:1.5rem;
}

/* gambar */
.entry-content img{
    display:block;
    width:100%;
    border-radius:1.5rem;
    margin:2.5rem 0;
}

/* dateline */
.dateline-koran strong{
    font-weight:900;
    color:#1e293b;
}

.dateline-koran {
    font-weight: 800;
    color: #0f172a;
    text-transform: uppercase;
    margin-right: 4px;
}

.separator {
    color: #cbd5e1;
    margin: 0 4px;
    font-weight: 300;
}

@media (max-width: 640px) {
    .entry-content {
        text-align: left; /* Di HP balik ke rata kiri biar gak aneh spasinya */
    }
}

</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".postGallery", {
            loop: true,
            autoHeight: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        });
    });
</script>
@endpush
@endsection