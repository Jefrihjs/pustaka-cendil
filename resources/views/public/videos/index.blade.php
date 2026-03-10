@extends('layouts.public')
@section('title', 'Galeri Video Desa Cendil')

@section('content')
<section class="py-16 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-black text-slate-800 mb-4">Galeri Video</h1>
            <p class="text-slate-500 max-w-2xl mx-auto font-medium">Kumpulan dokumentasi kegiatan dan kabar terbaru Desa Cendil dalam format video.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($videos as $video)
                <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-slate-100 group hover:shadow-xl transition-all duration-500">
                    {{-- Iframe YouTube --}}
                    <div class="aspect-video">
                        <iframe class="w-full h-full" 
                                src="https://www.youtube.com/embed/{{ $video->youtube_id }}" 
                                title="{{ $video->judul }}"
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="px-3 py-1 bg-red-50 text-red-600 text-[10px] font-black uppercase rounded-lg">YouTube</span>
                            <span class="text-[10px] text-slate-400 font-bold uppercase">{{ $video->created_at->format('d M Y') }}</span>
                        </div>
                        <h4 class="font-bold text-slate-800 leading-tight group-hover:text-red-600 transition-colors">{{ $video->judul }}</h4>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 font-bold italic">Belum ada koleksi video saat ini.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination (Jika video sudah banyak) --}}
        <div class="mt-12">
            {{ $videos->links() }}
        </div>
    </div>
</section>
@endsection