@extends('layouts.admin')
@section('title', 'Tambah Video YouTube')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-slate-200">
        <div class="w-20 h-20 bg-red-50 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-2xl font-black text-slate-800 mb-2">Tambah Video Baru</h2>
            <p class="text-sm text-slate-500 px-6">Tempelkan link YouTube kegiatan Pustaka Cendil di bawah ini.</p>
        </div>

        <form action="{{ route('admin.videos.store') }}" method="POST" class="space-y-6">
            @csrf
            
            {{-- Input Judul --}}
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Judul Video</label>
                <input type="text" name="judul" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-red-500 font-bold" placeholder="Contoh: Keseruan Panen Pentol Pedas">
            </div>

            {{-- Input Link YouTube (Kita ganti namanya jadi youtube_id agar Controller tidak bingung) --}}
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Link YouTube / Video ID</label>
                <input type="text" name="youtube_id" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-red-500" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                <p class="mt-2 text-[10px] text-slate-400 italic font-medium leading-relaxed">
                    * Bisa masukkan Link lengkap atau cukup Kode di belakang "v=" saja.
                </p>
            </div>

            {{-- Input Status (Wajib ada karena Controller minta divalidasi) --}}
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Status Tampilan</label>
                <select name="status" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl font-bold outline-none focus:ring-2 focus:ring-red-500">
                    <option value="publish">Tampilkan Langsung (Publish)</option>
                    <option value="draft">Simpan sebagai Draft</option>
                </select>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 py-4 bg-red-600 text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-red-900/20 hover:bg-red-700 transition-all active:scale-95">Simpan Video</button>
                <a href="{{ route('admin.videos.index') }}" class="px-8 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all text-center">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection