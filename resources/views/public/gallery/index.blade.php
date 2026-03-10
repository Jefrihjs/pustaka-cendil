@extends('layouts.public')
@section('title', 'Galeri Foto & Video Pustaka Cendil')

@section('content')
<section class="py-16 bg-slate-50 min-h-screen" x-data="{ tab: 'foto' }">
    <div class="container mx-auto px-6">
        
        <div class="text-center mb-12">
            <h1 class="text-4xl font-black text-slate-800 mb-4">Galeri Desa Cendil</h1>
            <div class="inline-flex p-1.5 bg-slate-200/50 rounded-2xl border border-slate-200 mt-6">
                <button @click="tab = 'foto'" :class="tab === 'foto' ? 'bg-white text-indigo-600 shadow-sm' : 'text-slate-500'" class="px-8 py-3 rounded-xl font-bold text-sm transition-all flex items-center gap-2">Foto</button>
                <button @click="tab = 'video'" :class="tab === 'video' ? 'bg-white text-red-600 shadow-sm' : 'text-slate-500'" class="px-8 py-3 rounded-xl font-bold text-sm transition-all flex items-center gap-2">Video</button>
            </div>
        </div>

        {{-- TAB FOTO --}}
        <div x-show="tab === 'foto'" x-data="{ open: false, imageSrc: '', imageCaption: '' }">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @forelse($photos as $photo)
                    <div class="flex flex-col gap-3 group"> 
                        <div class="relative aspect-square rounded-[2rem] overflow-hidden border border-slate-200 bg-white shadow-sm cursor-pointer"
                            @click="open = true; imageSrc = '{{ asset('storage/' . $photo->file_path) }}'; imageCaption = '{{ addslashes($photo->caption) }}'">
                            <img src="{{ asset('storage/' . $photo->file_path) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $photo->caption }}">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg></div>
                        </div>
                        <div class="px-2">
                            <p class="text-sm font-bold text-slate-700 italic leading-snug line-clamp-2">{{ $photo->caption }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center text-slate-400 font-bold italic">Belum ada koleksi foto.</div>
                @endforelse
            </div>
            <div class="mt-12">{{ $photos->appends(['tab' => 'foto'])->links() }}</div>

            {{-- MODAL FOTO --}}
            <div x-show="open" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/95 p-4" x-cloak>
                <div class="absolute inset-0" @click="open = false"></div>
                <button @click="open = false" class="absolute top-6 right-6 text-white z-[10002] bg-white/10 p-3 rounded-full"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg></button>
                <div class="relative z-[10001] max-w-5xl w-full flex flex-col items-center gap-6">
                    <img :src="imageSrc" class="max-w-full max-h-[75vh] rounded-2xl border-4 border-white/20 object-contain shadow-2xl">
                    <p x-text="imageCaption" class="text-white text-lg font-bold bg-black/50 px-6 py-2 rounded-full"></p>
                </div>
            </div>
        </div>

        {{-- TAB VIDEO --}}
        <div x-show="tab === 'video'" x-data="{ videoOpen: false, videoId: '', videoTitle: '' }" x-cloak>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($videos as $video)
                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-slate-100 group cursor-pointer"
                        @click="videoOpen = true; videoId = '{{ $video->youtube_id }}'; videoTitle = '{{ $video->judul }}'">
                        <div class="relative aspect-video bg-slate-900">
                            <img src="https://i.ytimg.com/vi/{{ $video->youtube_id }}/mqdefault.jpg" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-all">
                            <div class="absolute inset-0 flex items-center justify-center text-white group-hover:scale-125 transition-transform"><svg class="w-16 h-16 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path d="M4.5 14.5v-9L13 10l-8.5 4.5z"/></svg></div>
                        </div>
                        <div class="p-6"><h4 class="font-bold text-slate-800">{{ $video->judul }}</h4></div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center text-slate-400 font-bold italic">Belum ada koleksi video.</div>
                @endforelse
            </div>
            <div class="mt-12">{{ $videos->appends(['tab' => 'video'])->links() }}</div>

            {{-- MODAL VIDEO --}}
            <div x-show="videoOpen" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/95 p-4" x-cloak>
                <div class="absolute inset-0" @click="videoOpen = false; videoId = ''"></div>
                <button @click="videoOpen = false; videoId = ''" class="absolute top-6 right-6 text-white z-[10002] bg-white/10 p-3 rounded-full"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg></button>
                <div class="max-w-5xl w-full relative z-[10001] flex flex-col gap-4">
                    <div class="aspect-video w-full rounded-3xl overflow-hidden border border-white/10">
                        <template x-if="videoOpen"><iframe class="w-full h-full" :src="'https://www.youtube.com/embed/' + videoId + '?autoplay=1'" frameborder="0" allowfullscreen></iframe></template>
                    </div>
                    <h3 x-text="videoTitle" class="text-white text-xl font-black text-center"></h3>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection