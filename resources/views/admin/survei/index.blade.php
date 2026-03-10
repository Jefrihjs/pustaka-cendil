@extends('layouts.admin')
@section('title', 'Hasil Survei Pemustaka')

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 no-print">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Hasil Survei</h1>
            <p class="text-slate-500 font-medium">Data aspirasi pengunjung Pustaka Cendil.</p>
        </div>
        {{-- Tombol Cetak --}}
        <button onclick="window.print()" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-500 transition-all active:scale-95 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Cetak Laporan
        </button>
    </div>

    {{-- KOP SURAT (Hanya muncul saat diprint) --}}
    <div class="hidden print:block text-center mb-8 border-b-4 border-double border-slate-800 pb-4">
        <h1 class="text-2xl font-black uppercase">Laporan Hasil Survei Kebutuhan Pemustaka</h1>
        <p class="text-slate-600 font-bold uppercase tracking-widest text-sm">Pustaka Cendil - Desa Cendil, Belitung Timur</p>
        <p class="text-xs text-slate-400 mt-1">Dicetak pada: {{ now()->format('d F Y H:i') }}</p>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-[2.5rem] print:rounded-none shadow-sm print:shadow-none border border-slate-200 print:border-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 print:text-slate-900 uppercase tracking-widest border-print">Pemustaka</th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 print:text-slate-900 uppercase tracking-widest border-print">Detail</th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 print:text-slate-900 uppercase tracking-widest border-print">Subjek Dicari</th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 print:text-slate-900 uppercase tracking-widest border-print">Saran</th>
                        <th class="px-6 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($surveis as $s)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-5 border-print">
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider print:border print:border-slate-300
                                {{ $s->kategori == 'Pelajar' ? 'bg-blue-100 text-blue-600' : ($s->kategori == 'Mahasiswa' ? 'bg-indigo-100 text-indigo-600' : 'bg-emerald-100 text-emerald-600') }}">
                                {{ $s->kategori }}
                            </span>
                        </td>
                        <td class="px-6 py-5 border-print">
                            <div class="text-sm font-bold text-slate-700">{{ $s->pekerjaan }}</div>
                            <div class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">{{ $s->pendidikan }} • {{ $s->usia }} Tahun</div>
                        </td>
                        <td class="px-6 py-5 border-print">
                            <div class="text-sm font-medium text-slate-600 bg-slate-100 print:bg-transparent px-3 py-1 rounded-lg inline-block">
                                {{ $s->subjek_disarankan ?? 'Tidak diisi' }}
                            </div>
                        </td>
                        <td class="px-6 py-5 border-print">
                            <p class="text-sm text-slate-500 italic print:not-italic max-w-xs">"{{ $s->saran }}"</p>
                        </td>
                        <td class="px-6 py-5 no-print">
                            <div class="flex items-center gap-2">
                                <button onclick="showDetail('{{ $s->pekerjaan }}', '{{ addslashes($s->saran) }}')" class="p-2 text-blue-400 hover:text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <form action="{{ route('admin.survei.destroy', $s->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="p-2 text-red-400 hover:text-red-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-400 italic">Belum ada data survei yang masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- CSS KHUSUS PRINT --}}
<style>
    @media print {
        /* Sembunyikan Sidebar, Nav, dan Tombol */
        aside, nav, .no-print {
            display: none !important;
        }
        
        /* Reset background dan margin */
        body {
            background: white !important;
            margin: 0 !important;
        }

        /* Atur Tabel agar Full Screen di Kertas */
        main {
            margin: 0 !important;
            padding: 0 !important;
        }

        .border-print {
            border: 1px solid #e2e8f0 !important;
        }

        /* Hilangkan efek rounded dan shadow pas print */
        .rounded-[2.5rem] {
            border-radius: 0 !important;
        }
    }
</style>

@push('scripts')
<script>
    // Detail Pop-up
    function showDetail(pekerjaan, saran) {
        Swal.fire({
            title: 'Saran dari ' + pekerjaan,
            text: saran,
            icon: 'info',
            confirmButtonColor: '#4f46e5',
            confirmButtonText: 'Tutup',
            customClass: { popup: 'rounded-[2rem]' }
        });
    }

    // Konfirmasi Hapus
    function confirmDelete(btn) {
        Swal.fire({
            title: 'Hapus data ini?',
            text: "Data survei akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            customClass: { popup: 'rounded-[2rem]' }
        }).then((result) => {
            if (result.isConfirmed) {
                btn.closest('form').submit();
            }
        })
    }
</script>
@endpush
@endsection