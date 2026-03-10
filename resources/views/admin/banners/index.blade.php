@extends('layouts.admin')

@section('title', 'Setting Banner Beranda')

@section('content')
<div class="space-y-8">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Slide Banner Beranda</h1>
            <p class="text-sm text-slate-500 font-medium tracking-wide">Foto yang dicentang di sini akan muncul di slide utama halaman depan.</p>
        </div>
        <a href="{{ route('admin.banners.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-rose-600 text-white rounded-2xl font-bold shadow-lg shadow-rose-200 hover:bg-rose-500 transition-all active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0h-3m-9-4h10a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/></svg>
            Tambah Banner Baru
        </a>
    </div>

    {{-- Daftar Banner --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($banners as $banner)
        <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm group">
            <div class="relative h-48 overflow-hidden">
                <img src="{{ asset('storage/' . $banner->file_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute top-4 right-4 bg-emerald-500 text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                    Aktif di Beranda
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-sm font-bold text-slate-700 mb-4 line-clamp-2 leading-relaxed">
                    {{ $banner->caption }}
                </h3>
                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="text-xs font-black text-rose-600 uppercase tracking-widest hover:text-rose-800">Edit Text</a>
                    <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Hapus banner ini dari slide depan?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-xs font-black text-slate-400 uppercase tracking-widest hover:text-red-600 transition-colors">Copot Banner</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-center">
            <div class="w-20 h-20 bg-slate-50 text-slate-300 rounded-3xl flex items-center justify-center mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <p class="text-slate-400 font-bold italic">Belum ada banner yang aktif.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection