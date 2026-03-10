@extends('layouts.admin')

@section('title', 'Laporan Hasil SKM (9 Unsur)')

@section('content')
<div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 overflow-hidden">
    <div class="p-8 border-b border-slate-100 flex justify-between items-center bg-gradient-to-r from-white to-slate-50">
        <div>
            <h3 class="text-xl font-black text-slate-800 tracking-tight">Data Indeks Kepuasan Masyarakat</h3>
            <p class="text-sm text-slate-500 font-medium italic">Seluruh penilaian dari warga Desa Cendil</p>
        </div>
    </div>

    <div class="overflow-x-auto p-6">
        <table class="w-full text-left border-separate border-spacing-y-3">
            <thead>
                <tr class="text-slate-400 text-[10px] uppercase font-black tracking-widest px-4">
                    <th class="p-4">No</th>
                    <th class="p-4">Nilai (U1-U9)</th>
                    <th class="p-4">Saran / Masukan</th>
                    <th class="p-4">Tanggal Masuk</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @forelse($skms as $index => $skm)
                <tr class="bg-slate-50 hover:bg-white hover:shadow-md transition-all duration-300 group">
                    <td class="p-4 rounded-l-2xl font-bold text-slate-400">{{ $index + 1 }}</td>
                    <td class="p-4">
                        <div class="flex gap-1">
                            @for($i=1; $i<=9; $i++)
                                @php $val = $skm->{'u'.$i}; @endphp
                                <span class="w-6 h-6 flex items-center justify-center rounded-md text-[10px] font-bold {{ $val >= 3 ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                    {{ $val }}
                                </span>
                            @endfor
                        </div>
                    </td>
                    <td class="p-4 italic text-slate-600">
                        {{ $skm->saran ?? '-' }}
                    </td>
                    <td class="p-4 text-slate-500 font-medium">
                        {{ $skm->created_at->format('d M Y') }}
                    </td>
                    <td class="p-4 rounded-r-2xl">
                        <div class="flex items-center justify-center gap-3">
                            {{-- TOMBOL MATA --}}
                            <button 
                                @click="$dispatch('open-detail', { 
                                    email: '{{ $skm->email }}',
                                    jk: '{{ $skm->jenis_kelamin }}',
                                    umur: '{{ $skm->umur }}',
                                    pendidikan: '{{ $skm->pendidikan }}',
                                    pekerjaan: '{{ $skm->pekerjaan }}',
                                    saran: '{{ addslashes($skm->saran) ?? '-' }}'
                                })"
                                class="p-2 text-indigo-400 hover:text-indigo-600 transition-all hover:bg-indigo-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>

                            {{-- TOMBOL DELETE --}}
                            <form action="{{ route('admin.skm.destroy', $skm->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <button class="p-2 text-red-400 hover:text-red-600 transition-all hover:bg-red-50 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-slate-400 font-bold italic">Belum ada data survei yang masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<div x-data="{ open: false, data: {} }" 
     @open-detail.window="open = true; data = $event.detail"
     x-show="open" 
     class="fixed inset-0 z-[99] overflow-y-auto" 
     x-cloak>
    
    <div class="flex items-center justify-center min-h-screen px-4 py-12">
        {{-- Overlay Backdrop --}}
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" @click="open = false"></div>

        {{-- Box Modal --}}
        <div class="relative bg-white w-full max-w-lg p-8 rounded-[3rem] shadow-2xl border border-slate-100 transform transition-all">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight">Profil Responden</h3>
                    <p class="text-sm text-slate-400 font-medium">Detail pengisi survei SKM</p>
                </div>
                <button @click="open = false" class="p-2 bg-slate-50 text-slate-400 hover:text-rose-500 rounded-2xl transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="p-4 bg-slate-50 rounded-[1.5rem] border border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Jenis Kelamin</span>
                    <span class="font-bold text-slate-700" x-text="data.jk"></span>
                </div>
                <div class="p-4 bg-slate-50 rounded-[1.5rem] border border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Umur</span>
                    <span class="font-bold text-slate-700" x-text="data.umur + ' Tahun'"></span>
                </div>
                <div class="p-4 bg-slate-50 rounded-[1.5rem] border border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Pendidikan</span>
                    <span class="font-bold text-slate-700" x-text="data.pendidikan"></span>
                </div>
                <div class="p-4 bg-slate-50 rounded-[1.5rem] border border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-1">Pekerjaan</span>
                    <span class="font-bold text-slate-700" x-text="data.pekerjaan"></span>
                </div>
            </div>

            <div class="p-6 bg-indigo-50 rounded-[2rem] border border-indigo-100 mb-4">
                <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest block mb-2">Alamat Email</span>
                <span class="font-bold text-indigo-900 break-all" x-text="data.email"></span>
            </div>

            <div class="p-6 bg-amber-50 rounded-[2rem] border border-amber-100">
                <span class="text-[10px] font-black text-amber-400 uppercase tracking-widest block mb-2">Saran / Masukan</span>
                <p class="text-sm italic text-amber-900 leading-relaxed" x-text="data.saran"></p>
            </div>
        </div>
    </div>
</div>