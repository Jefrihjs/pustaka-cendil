@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-black text-slate-800">Edit Banner Beranda</h1>
        <div class="mt-4 inline-block p-2 bg-white rounded-3xl shadow-sm border border-slate-100">
            <img src="{{ asset('storage/' . $banner->file_path) }}" class="w-64 h-32 object-cover rounded-2xl">
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-[2.5rem] p-8 md:p-12 shadow-sm">
        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Caption / Judul</label>
                <textarea name="caption" rows="3" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-rose-500/10 outline-none font-bold text-slate-700">{{ $banner->caption }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Ganti Foto (Opsional)</label>
                <input type="file" name="foto" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl file:hidden font-bold text-slate-500 cursor-pointer">
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('admin.banners.index') }}" class="flex-1 text-center py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">Batal</a>
                <button type="submit" class="flex-1 py-4 bg-rose-600 text-white rounded-2xl font-black uppercase hover:bg-rose-700 shadow-xl shadow-rose-100 transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection