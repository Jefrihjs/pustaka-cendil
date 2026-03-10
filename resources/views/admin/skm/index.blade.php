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
                    <td class="p-4 rounded-r-2xl text-center">
                        <form action="{{ route('admin.skm.destroy', $skm->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 text-red-400 hover:text-red-600 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </form>
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