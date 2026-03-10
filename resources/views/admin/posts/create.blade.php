@extends('layouts.admin')
@section('title', 'Tulis Berita Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-200">
            <div class="space-y-6">
                
                {{-- 1. JUDUL BERITA --}}
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" required
                           class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none" 
                           placeholder="Masukkan judul yang menarik...">
                    @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- 2. BARIS KATEGORI & LOKASI (GRID) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Kategori</label>
                        <select name="kategori" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none">
                            <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                            <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="Pustaka" {{ old('kategori') == 'Pustaka' ? 'selected' : '' }}>Pustaka</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Lokasi Kegiatan</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                               class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none" 
                               placeholder="Contoh: Manggar, Kelapa kampit">
                    </div>
                </div>

                {{-- 3. INPUT WAKTU (SESUAI PERMINTAAN KEPALA PERPUS) --}}
                <div>
                    <label class="text-[10px] font-black text-blue-600 uppercase tracking-widest block mb-2">Atur Tanggal & Jam Terbit</label>
                    <div class="relative">
                        <input type="datetime-local" name="created_at" 
                               value="{{ old('created_at', date('Y-m-d\TH:i')) }}" 
                               class="w-full p-4 bg-blue-50/50 border border-blue-100 text-blue-700 rounded-2xl focus:ring-2 focus:ring-blue-500 outline-none font-bold">
                    </div>
                    <p class="mt-2 text-[10px] text-slate-400 italic">* Format: Tanggal/Bulan/Tahun Jam:Menit. Gunakan untuk mengatur jadwal tayang berita.</p>
                </div>

                {{-- 4. ISI BERITA --}}
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Isi Berita</label>
                    <textarea name="konten" rows="10" required
                              class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 outline-none" 
                              placeholder="Tulis isi berita di sini...">{{ old('konten') }}</textarea>
                    @error('konten') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- 5. UPLOAD FOTO --}}
                <div class="space-y-4">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Foto Berita (Bisa pilih banyak)</label>
                    
                    <div class="relative p-8 border-2 border-dashed border-slate-200 rounded-[2rem] bg-slate-50/50 text-center group hover:border-indigo-400 transition-all">
                        {{-- KUNCINYA: Tambah onchange="previewImages(event)" --}}
                        <input type="file" name="images[]" multiple id="images" class="hidden" accept="image/*" onchange="previewImages(event)">
                        
                        <label for="images" class="cursor-pointer block">
                            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span id="upload-text" class="text-sm font-bold text-slate-500 group-hover:text-indigo-600">Klik untuk pilih beberapa foto</span>
                        </label>
                    </div>

                    {{-- TEMPAT PREVIEW --}}
                    <div id="image-preview-container" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-3 mt-4">
                        {{-- Gambar muncul di sini --}}
                    </div>

                    <p class="mt-3 text-[10px] text-slate-400 italic">Format: JPG, PNG, WEBP. Maksimal 2MB per foto.</p>
                </div>

            {{-- 6. TOMBOL AKSI --}}
            <div class="mt-12 flex gap-4 pt-8 border-t border-slate-100">
                <button type="submit" class="px-10 py-4 bg-indigo-600 text-white rounded-[1.5rem] font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-500 hover:scale-105 transition-all">
                    Terbitkan Berita
                </button>

                {{-- Tombol Draft (BARU) --}}
                <button type="submit" name="status" value="draft" 
                        class="px-8 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">
                    Simpan sebagai Draft
                </button>
                
                <a href="{{ route('admin.posts.index') }}" class="px-10 py-4 bg-slate-100 text-slate-600 rounded-[1.5rem] font-bold hover:bg-slate-200 transition-all text-center">
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
<script>
    function previewImages(event) {
        const previewContainer = document.getElementById('image-preview-container');
        const uploadText = document.getElementById('upload-text');
        const files = event.target.files;

        // Kosongkan preview lama
        previewContainer.innerHTML = '';

        if (files.length > 0) {
            uploadText.innerText = files.length + " Foto Berhasil Dipilih";
            
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                const file = files[i];

                reader.onload = function(e) {
                    const html = `
                        <div class="relative aspect-video rounded-xl overflow-hidden border-2 border-white shadow-sm ring-1 ring-slate-200">
                            <img src="${e.target.result}" class="w-full h-full object-cover">
                        </div>
                    `;
                    previewContainer.insertAdjacentHTML('beforeend', html);
                }

                reader.readAsDataURL(file);
            }
        } else {
            uploadText.innerText = "Klik untuk pilih beberapa foto";
        }
    }
</script>