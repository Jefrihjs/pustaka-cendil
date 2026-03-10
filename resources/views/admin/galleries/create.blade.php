@extends('layouts.admin')
@section('title', 'Tambah Foto Galeri')

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-slate-200">
            <div class="space-y-6">
                {{-- Preview Area --}}
                <div class="relative w-full aspect-square bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2.5rem] flex flex-col items-center justify-center overflow-hidden group">
                    <input type="file" name="foto" required class="absolute inset-0 opacity-0 cursor-pointer z-10" onchange="previewImage(event)">
                    <div id="placeholder-text" class="text-center p-6">
                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Klik untuk Pilih Foto</p>
                    </div>
                    <img id="img-preview" class="absolute inset-0 w-full h-full object-cover hidden">
                </div>

                
                {{-- GEMBOK: Hanya Super Admin yang bisa akses --}}
                @can('super-admin-only')
                    <div class="p-6 bg-indigo-50 rounded-2xl border border-indigo-100 mt-4">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="is_banner" value="1" {{ isset($gallery) && $gallery->is_banner ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 rounded-lg focus:ring-indigo-500">
                            <div>
                                <span class="block text-sm font-black text-indigo-900 uppercase">Jadikan Banner Beranda</span>
                                <span class="text-xs text-indigo-600 font-medium italic">Foto ini akan muncul di slide paling atas halaman depan.</span>
                            </div>
                        </label>
                    </div>
                @else
                    {{-- Jika user biasa, paksa nilainya 0 (tidak jadi banner) lewat hidden input --}}
                    <input type="hidden" name="is_banner" value="0">
                @endcan
                
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Kategori Kegiatan</label>
                    <select name="kategori" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 font-bold text-slate-700">
                        <option value="Literasi">📚 Literasi & Membaca</option>
                        <option value="Pentol Pedas">🌱 Pertanian (Pentol Pedas)</option>
                        <option value="Kesenian">🎨 Seni & Budaya</option>
                        <option value="Lainnya">✨ Kegiatan Lainnya</option>
                    </select>
                </div>

                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Keterangan Foto (Caption)</label>
                    <textarea name="caption" rows="3" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:ring-2 focus:ring-blue-500 text-slate-600" placeholder="Ceritakan sedikit tentang foto ini..."></textarea>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="flex-1 py-4 bg-blue-600 text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-blue-900/20 hover:bg-blue-500 transition-all active:scale-95">Simpan Foto</button>
                    <a href="{{ route('admin.galleries.index') }}" class="px-8 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">Batal</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('img-preview');
            const placeholder = document.getElementById('placeholder-text');
            output.src = reader.result;
            output.classList.remove('hidden');
            placeholder.classList.add('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection