@extends('layouts.admin')
@section('title', 'Manajemen Video YouTube')

@section('content')
<div class="space-y-8" x-data="{ confirmDelete: false, deleteUrl: '' }">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Koleksi Video Kegiatan</h1>
            <p class="text-sm text-slate-500 font-medium">Daftar video YouTube yang ditampilkan di halaman depan.</p>
        </div>
        <a href="{{ route('admin.videos.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-red-600 text-white rounded-2xl font-bold shadow-lg shadow-red-200 hover:bg-red-500 transition-all active:scale-95">
            Tambah Video Baru
        </a>
    </div>

    {{-- Grid Video --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($videos as $video)
        <div class="bg-white border border-slate-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-md transition-all group">
            <div class="relative aspect-video bg-slate-100 overflow-hidden">
                <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/mqdefault.jpg" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6">
                <h3 class="font-bold text-slate-800 leading-tight mb-4 line-clamp-2 h-10">{{ $video->judul }}</h3>
                <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">ID: {{ $video->youtube_id }}</span>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.videos.edit', $video->id) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-xl hover:bg-yellow-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </a>
                        
                        {{-- Tombol Hapus (Ganti ke Modal) --}}
                        <button type="button" @click="confirmDelete = true; deleteUrl = '{{ route('admin.videos.destroy', $video->id) }}'" class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center">Belum ada video.</div>
        @endforelse
    </div>

    {{-- MODAL KONFIRMASI HAPUS VIDEO --}}
    <div x-show="confirmDelete" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="confirmDelete = false"></div>
        <div class="relative bg-white rounded-[2.5rem] p-10 max-w-md w-full text-center shadow-2xl border border-slate-100" x-show="confirmDelete" x-transition>
            <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-100/50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <h3 class="text-2xl font-black text-slate-800 mb-2">Hapus Video?</h3>
            <p class="text-sm text-slate-500 mb-8 font-medium italic">Video ini tidak akan muncul lagi di halaman depan Pustaka Cendil.</p>
            <div class="flex gap-4">
                <button @click="confirmDelete = false" class="flex-1 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">Batal</button>
                <form :action="deleteUrl" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-4 bg-red-600 text-white rounded-2xl font-black uppercase hover:bg-red-700 shadow-xl shadow-red-200 transition-all">Ya, Hapus!</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection