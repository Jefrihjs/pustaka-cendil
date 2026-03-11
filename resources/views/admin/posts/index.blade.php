@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="space-y-8">
    
    {{-- Header & Tombol Tambah --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Daftar Berita & Artikel</h1>
            <p class="text-sm text-slate-500 font-medium">Kelola informasi dan kabar terbaru untuk warga Desa Cendil.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-500 transition-all active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tulis Berita Baru
        </a>
    </div>

    {{-- Tabel Berita --}}
    <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-white">
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Informasi Berita</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest">Tanggal Terbit</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($posts as $post)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                {{-- Thumbnail Kecil --}}
                                <div class="w-16 h-12 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-200 shadow-sm">
                                    @if($post->images && $post->images->count() > 0)
                                        <img src="{{ asset('storage/' . $post->images->first()->path) }}" 
                                             class="w-full h-full object-cover"
                                             alt="Thumbnail">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 leading-tight mb-1">{{ $post->judul }}</h4>
                                    <div class="flex items-center gap-2">
                                        <span class="text-[9px] px-2 py-0.5 bg-slate-100 text-slate-500 rounded-md font-bold uppercase">{{ $post->kategori ?? 'Umum' }}</span>
                                        <p class="text-[10px] text-slate-400 font-medium">/berita/{{ $post->slug }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-center">
                            @if($post->status == 'publish' || !$post->status) {{-- Default --}}
                                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[10px] font-black uppercase border border-emerald-100">Diterbitkan</span>
                            @else
                                <span class="px-3 py-1 bg-slate-100 text-slate-500 rounded-lg text-[10px] font-black uppercase border border-slate-200">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-slate-600">
                                    {{ $post->created_at->timezone('Asia/Jakarta')->format('d M Y') }}
                                </span>
                                <span class="text-[10px] text-slate-400">
                                    {{ $post->created_at->timezone('Asia/Jakarta')->format('H:i') }} WIB
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('admin.posts.edit', $post->id) }}" 
                                   class="p-2 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm group"
                                   title="Edit Berita">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M16.5 3.5a2.121 2.121 0 113 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                    </svg>
                                </a>

                                {{-- Tombol Hapus --}}
                                <button type="button" 
                                        onclick="confirmDelete('{{ $post->id }}')" 
                                        class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-sm"
                                        title="Hapus Berita">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>

                                {{-- Form Tersembunyi untuk Proses Hapus --}}
                                <form id="delete-form-{{ $post->id }}" 
                                      action="{{ route('admin.posts.destroy', $post->id) }}" 
                                      method="POST" 
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-slate-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"/></svg>
                                <p class="text-slate-400 font-bold tracking-wide italic">Belum ada berita yang ditulis.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus Berita?',
        text: "Data yang dihapus tidak bisa dikembalikan, Bang Jefri!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2563eb', // Biru
        cancelButtonColor: '#ef4444', // Merah
        confirmButtonText: 'Ya, Hapus Saja!',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>
@endpush
@endsection