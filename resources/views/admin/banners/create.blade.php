@extends('layouts.admin')

@section('title', 'Tambah Banner Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-black text-slate-800 tracking-tight">Upload Banner Baru</h1>
        <p class="text-sm text-slate-500 font-medium">Gunakan foto landscape berkualitas tinggi untuk hasil terbaik.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-[2.5rem] p-8 md:p-12 shadow-sm">
        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Caption / Judul Banner</label>
                <textarea name="caption" rows="3" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-rose-500/10 outline-none font-bold text-slate-700" placeholder="Contoh: Selamat Datang di Pustaka Cendil..."></textarea>
            </div>

            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">File Foto Banner</label>
                <input type="file" name="foto" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl file:hidden font-bold text-slate-500 cursor-pointer">
                <p class="mt-2 text-[10px] text-slate-400 font-bold uppercase italic tracking-tighter">* Maksimal 20MB (Rekomendasi Landscape)</p>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('admin.banners.index') }}" class="flex-1 text-center py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">Batal</a>
                <button type="submit" class="flex-1 py-4 bg-rose-600 text-white rounded-2xl font-black uppercase hover:bg-rose-700 shadow-xl shadow-rose-100 transition-all">Upload Banner</button>
            </div>
        </form>
    </div>
</div>
@endsection