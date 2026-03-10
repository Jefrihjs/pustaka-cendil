@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
            <h1 class="text-2xl font-black text-slate-800">Edit Foto</h1>
            <a href="{{ route('admin.galleries.index') }}" class="text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors">Batal</a>
        </div>

        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            {{-- Preview Foto Lama --}}
            <div class="space-y-2">
                <label class="text-sm font-black text-slate-700 uppercase tracking-wider">Foto Saat Ini</label>
                <div class="w-48 h-48 rounded-3xl overflow-hidden border-4 border-slate-100">
                    <img src="{{ asset('storage/' . $gallery->file_path) }}" class="w-full h-full object-cover">
                </div>
            </div>

            {{-- Upload Foto Baru (Opsional) --}}
            <div class="space-y-2">
                <label class="text-sm font-black text-slate-700 uppercase tracking-wider">Ganti Foto (Kosongkan jika tidak diubah)</label>
                <input type="file" name="foto" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl">
            </div>

            @can('super-admin-only')
            <div class="p-6 bg-indigo-50 rounded-2xl border border-indigo-100 mt-4">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_banner" value="1" {{ isset($gallery) && $gallery->is_banner ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 rounded-lg focus:ring-indigo-500">
                    <div>
                        <span class="block text-sm font-black text-indigo-900">Jadikan Banner Beranda</span>
                        <span class="text-xs text-indigo-600 font-medium italic">Foto ini akan muncul di slide paling atas halaman depan.</span>
                    </div>
                </label>
            </div>
            @else
                    {{-- Jika user biasa, paksa nilainya 0 (tidak jadi banner) lewat hidden input --}}
                    <input type="hidden" name="is_banner" value="0">
            @endcan

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-black text-slate-700 uppercase tracking-wider">Kategori</label>
                    <select name="kategori" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl font-medium">
                        <option value="Kegiatan" {{ $gallery->kategori == 'Kegiatan' ? 'selected' : '' }}>Kegiatan Desa</option>
                        <option value="Fasilitas" {{ $gallery->kategori == 'Fasilitas' ? 'selected' : '' }}>Fasilitas Pustaka</option>
                        <option value="Dokumentasi" {{ $gallery->kategori == 'Dokumentasi' ? 'selected' : '' }}>Dokumentasi</option>
                    </select>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-black text-slate-700 uppercase tracking-wider">Caption / Keterangan</label>
                <textarea name="caption" rows="3" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl font-medium">{{ $gallery->caption }}</textarea>
            </div>

            <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-black uppercase tracking-widest hover:bg-blue-500 shadow-xl shadow-blue-200 transition-all active:scale-95">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection