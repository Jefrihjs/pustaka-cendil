@extends('layouts.admin')

@section('title', 'Edit Video YouTube')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
            <h1 class="text-2xl font-black text-slate-800">Edit Data Video</h1>
            <a href="{{ route('admin.videos.index') }}" class="text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors">Batal</a>
        </div>

        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            {{-- Preview Video Saat Ini --}}
            <div class="space-y-2">
                <label class="text-sm font-black text-slate-700 uppercase tracking-wider">Preview Saat Ini</label>
                <div class="aspect-video rounded-3xl overflow-hidden border-4 border-slate-100 bg-slate-900">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $video->youtube_id }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Judul Video --}}
                <div class="space-y-2">
                    <label class="text-sm font-black text-slate-700 uppercase tracking-wider">Judul Video</label>
                    <input type="text" name="judul" value="{{ $video->judul }}" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl font-medium" required>
                </div>

                {{-- Status --}}
                <div class="space-y-2">
                    <label class="text-sm font-black text-slate-700 uppercase tracking-wider">Status Tampilan</label>
                    <select name="status" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl font-medium">
                        <option value="publish" {{ $video->status == 'publish' ? 'selected' : '' }}>Tampilkan (Publish)</option>
                        <option value="draft" {{ $video->status == 'draft' ? 'selected' : '' }}>Sembunyikan (Draft)</option>
                    </select>
                </div>
            </div>

            {{-- YouTube ID --}}
            <div class="space-y-2">
                <label class="text-sm font-black text-slate-700 uppercase tracking-wider">YouTube Video ID</label>
                <input type="text" name="youtube_id" value="{{ $video->youtube_id }}" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl font-medium" placeholder="Contoh: dQw4w9WgXcQ" required>
                <p class="text-[10px] text-slate-400 font-medium italic">Ambil kode unik di belakang link YouTube (setelah v=)</p>
            </div>

            <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-black uppercase tracking-widest hover:bg-blue-700 shadow-xl shadow-blue-200 transition-all active:scale-95">
                Simpan Perubahan Video
            </button>
        </form>
    </div>
</div>
@endsection