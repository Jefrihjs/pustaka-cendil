@extends('layouts.admin')

@section('title', 'Koleksi Galeri')

@section('content')
{{-- Tambahkan x-data di sini untuk kontrol Modal --}}
<div class="space-y-8" x-data="{ confirmDelete: false, deleteUrl: '' }">
    
    {{-- Header Tetap Sama --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen Galeri Foto</h1>
            <p class="text-sm text-slate-500 font-medium">Koleksi dokumentasi visual kegiatan Pustaka Cendil.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-blue-600 text-white rounded-2xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-500 transition-all active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Foto Baru
        </a>
    </div>

    {{-- Grid Galeri --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($galleries as $gallery)
        <div class="group bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
            <div class="relative aspect-square overflow-hidden bg-slate-100">
                <img src="{{ asset('storage/' . $gallery->file_path) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                {{-- Overlay Aksi --}}
                <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3 z-20">
                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="w-12 h-12 bg-white text-yellow-600 rounded-2xl flex items-center justify-center hover:bg-yellow-500 hover:text-white transition-all shadow-xl active:scale-90">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>
                    
                    {{-- Tombol Hapus (Ganti dari submit ke @click) --}}
                    <button type="button" @click="confirmDelete = true; deleteUrl = '{{ route('admin.galleries.destroy', $gallery->id) }}'" class="w-12 h-12 bg-white text-red-600 rounded-2xl flex items-center justify-center hover:bg-red-600 hover:text-white transition-all shadow-xl active:scale-90">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <p class="text-sm text-slate-600 font-medium line-clamp-2 italic leading-relaxed">"{{ $gallery->caption }}"</p>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center">Belum ada foto.</div>
        @endforelse
    </div>

    {{-- MODAL KONFIRMASI HAPUS (Gantinya Chrome) --}}
    <div x-show="confirmDelete" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="confirmDelete = false"></div>
        <div class="relative bg-white rounded-[2.5rem] p-10 max-w-md w-full text-center shadow-2xl border border-slate-100" x-show="confirmDelete" x-transition>
            <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-100/50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <h3 class="text-2xl font-black text-slate-800 mb-2">Hapus Foto?</h3>
            <p class="text-sm text-slate-500 mb-8 font-medium italic">Data ini akan hilang selamanya dari galeri Pustaka Cendil.</p>
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