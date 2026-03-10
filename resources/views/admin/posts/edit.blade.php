@extends('layouts.admin')
@section('title', 'Edit Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- FORM UTAMA UNTUK UPDATE BERITA --}}
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-200">
            <div class="space-y-6">
                {{-- 1. INPUT JUDUL --}}
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul', $post->judul) }}" 
                           class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none" 
                           placeholder="Masukkan judul yang menarik...">
                           @error('judul')
                                <p class="text-red-500 text-[10px] mt-1 font-bold italic">* {{ $message }}</p>
                            @enderror
                </div>

                {{-- 2. BARIS KATEGORI & LOKASI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Kategori</label>
                        <select name="kategori" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none">
                            <option value="Umum" {{ old('kategori', $post->kategori) == 'Umum' ? 'selected' : '' }}>Umum</option>
                            <option value="Kegiatan" {{ old('kategori', $post->kategori) == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="Pengumuman" {{ old('kategori', $post->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="Pustaka" {{ old('kategori', $post->kategori) == 'Pustaka' ? 'selected' : '' }}>Pustaka</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Lokasi Kegiatan</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi', $post->lokasi) }}"
                               class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none" 
                               placeholder="Contoh: Gedung Pustaka Cendil">
                    </div>
                </div>

                {{-- 3. INPUT TANGGAL & JAM --}}
                <div>
                    <label class="text-[10px] font-black text-blue-600 uppercase tracking-widest block mb-2 font-bold">Atur Tanggal & Jam Terbit</label>
                    <input type="datetime-local" name="created_at" 
                           value="{{ old('created_at', $post->created_at->format('Y-m-d\TH:i')) }}" 
                           class="w-full p-4 bg-blue-50/50 border border-blue-100 text-blue-700 rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none font-bold">
                </div>

                {{-- 4. INPUT KONTEN --}}
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Isi Berita</label>
                    <textarea name="konten" rows="10" 
                              class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none" 
                              placeholder="Tulis isi berita di sini...">{{ old('konten', $post->konten) }}</textarea>
                </div>

                {{-- 5. PREVIEW FOTO LAMA (Hanya Tampilan) --}}
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-4">
                        Foto Saat Ini (Klik ikon sampah untuk hapus satuan)
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                        @forelse($post->images as $img)
                            <div class="relative aspect-square group overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
                                <img src="{{ asset('storage/' . $img->path) }}" class="w-full h-full object-cover">
                                
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center">
                                    <button type="button" 
                                            onclick="confirmDeleteImage('{{ $img->id }}')" 
                                            class="p-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <p class="text-xs text-slate-400 italic">Belum ada foto.</p>
                        @endforelse
                    </div>
                </div>

                {{-- 6. TAMBAH FOTO BARU --}}
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Tambah Foto Baru (Opsional)</label>
                    <input type="file" name="images[]" multiple 
                           class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            {{-- 7. TOMBOL AKSI --}}
            <div class="mt-8 flex flex-wrap gap-3 pt-6 border-t border-slate-100">
                
                {{-- Tombol untuk Terbitkan (Update status jadi publish) --}}
                <button type="submit" name="status" value="publish" 
                        class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-500 transition-all">
                    Simpan & Terbitkan
                </button>

                {{-- Tombol untuk kembalikan ke Draft (Update status jadi draft) --}}
                <button type="submit" name="status" value="draft" 
                        class="px-8 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">
                    Simpan sebagai Draft
                </button>

                <a href="{{ route('admin.posts.index') }}" class="px-8 py-4 text-slate-400 font-bold hover:text-slate-600 transition-all">
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>

{{-- FORM TERPISAH UNTUK HAPUS GAMBAR (Diletakkan di luar form utama agar tidak bentrok) --}}
@foreach($post->images as $img)
    <form id="delete-image-{{ $img->id }}" action="{{ route('admin.posts.image.destroy', $img->id) }}" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
@endforeach

@push('scripts')
<script>
    function confirmDeleteImage(id) {
        Swal.fire({
            title: 'Hapus foto ini?',
            text: "Foto yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-image-' + id).submit();
            }
        })
    }
</script>
@endpush
@endsection