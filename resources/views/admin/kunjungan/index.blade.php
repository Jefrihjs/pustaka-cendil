@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-slate-100">
        <div class="bg-slate-900 p-8 rounded-t-[2.5rem] flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-2xl font-black text-white italic tracking-tighter uppercase">Buku Tamu Digital</h1>
                <p class="text-slate-400 text-xs">Catat kehadiran pemustaka Pustaka Cendil</p>
            </div>

            <a href="{{ route('admin.kunjungan.qr') }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 rounded-xl transition-all duration-300 text-xs font-bold shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 4h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Generate QR Code
            </a>
        </div>

        <form action="{{ route('admin.kunjungan.store') }}" method="POST" class="p-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nama --}}
                <div class="col-span-2">
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" required class="w-full bg-slate-50 border-none rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 transition-all">
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required class="w-full bg-slate-50 border-none rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 transition-all">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                {{-- Tanggal --}}
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tanggal Kunjungan</label>
                    <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" required class="w-full bg-slate-50 border-none rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 transition-all">
                </div>

                {{-- Tujuan --}}
                <div class="col-span-2">
                    <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tujuan Kedatangan</label>
                    <select name="tujuan" required class="w-full bg-slate-50 border-none rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500 transition-all">
                        <option value="Baca Buku">Baca Buku / Referensi</option>
                        <option value="Pinjam/Kembali">Pinjam atau Kembali Buku</option>
                        <option value="Internet/WiFi">Akses Internet / WiFi</option>
                        <option value="Diskusi/Kegiatan">Diskusi / Mengikuti Kegiatan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full mt-8 bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-200 transition-all active:scale-95 uppercase tracking-widest">
                Simpan Kehadiran
            </button>
        </form>
    </div>

    {{-- Tabel Riwayat Singkat --}}
    <div class="mt-12 bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100">
        <h3 class="font-bold text-slate-800 mb-4">Kunjungan Terakhir</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-[10px] uppercase font-bold text-slate-400 border-b">
                        <th class="py-3">Nama</th>
                        <th class="py-3">Tujuan</th>
                        <th class="py-3">Waktu</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($kunjungans as $k)
                    <tr class="border-b border-slate-50 last:border-0">
                        <td class="py-3 font-bold text-slate-700">{{ $k->nama }}</td>
                        <td class="py-3 text-slate-500">{{ $k->tujuan }}</td>
                        <td class="py-3 text-slate-400 text-xs">{{ $k->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection