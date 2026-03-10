@extends('layouts.admin')

@section('title', 'Detail Anggota - ' . $member->nama)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-800">Profil Anggota</h1>
        <a href="{{ route('admin.members.index') }}" class="text-sm text-slate-500 hover:text-slate-800">&larr; Kembali</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        {{-- Header Profil --}}
        <div class="bg-slate-900 p-8 text-white flex items-center justify-between">
            <div class="flex items-center gap-6">
                <div class="w-20 h-20 bg-slate-700 rounded-full flex items-center justify-center text-3xl font-bold">
                    {{ strtoupper(substr($member->nama, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-2xl font-bold">{{ $member->nama }}</h2>
                    <p class="text-slate-400 font-mono">{{ $member->kode_anggota ?? 'Belum Aktif' }}</p>
                </div>
            </div>
            <div class="text-right">
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $member->status == 'aktif' ? 'bg-green-500' : 'bg-amber-500' }}">
                    {{ $member->status }}
                </span>
            </div>
        </div>

        {{-- Grid Data --}}
        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Kelompok Identitas --}}
            <div class="space-y-4">
                <h3 class="font-bold text-slate-800 border-b pb-2">Identitas Pribadi</h3>
                <div>
                    <label class="block text-xs text-slate-500 uppercase">Tempat, Tanggal Lahir</label>
                    <p class="text-slate-700">{{ $member->tempat_lahir ?? '-' }}, {{ $member->tanggal_lahir ? \Carbon\Carbon::parse($member->tanggal_lahir)->format('d M Y') : '-' }}</p>
                </div>
                <div>
                    <label class="block text-xs text-slate-500 uppercase">Jenis Kelamin</label>
                    <p class="text-slate-700">{{ $member->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                </div>
                <div>
                    <label class="block text-xs text-slate-500 uppercase">No. WhatsApp</label>
                    <p class="text-slate-700">{{ $member->no_hp ?? '-' }}</p>
                </div>
            </div>

            {{-- Kelompok Pekerjaan/Pendidikan --}}
            <div class="space-y-4">
                <h3 class="font-bold text-slate-800 border-b pb-2">Pekerjaan / Pendidikan</h3>
                <div>
                    <label class="block text-xs text-slate-500 uppercase">Kategori & Instansi</label>
                    <p class="text-slate-700 font-semibold">{{ ucfirst($member->kategori_pekerjaan) }}</p>
                    <p class="text-slate-600">{{ $member->instansi ?? '-' }}</p>
                </div>
                @if($member->fakultas)
                <div>
                    <label class="block text-xs text-slate-500 uppercase">Fakultas / Jurusan</label>
                    <p class="text-slate-700">{{ $member->fakultas }}</p>
                </div>
                @endif
                @if($member->kelas)
                <div>
                    <label class="block text-xs text-slate-500 uppercase">Kelas</label>
                    <p class="text-slate-700">{{ $member->kelas }}</p>
                </div>
                @endif
            </div>

            {{-- Kelompok Alamat --}}
            <div class="md:col-span-2 space-y-4">
                <h3 class="font-bold text-slate-800 border-b pb-2">Alamat Rumah</h3>
                <p class="text-slate-700 italic">"{{ $member->alamat_rumah ?? '-' }}"</p>
                <div class="flex gap-8 text-sm text-slate-600">
                    <span><strong>RT:</strong> {{ $member->rt ?? '-' }}</span>
                    <span><strong>RW:</strong> {{ $member->rw ?? '-' }}</span>
                    <span><strong>Desa:</strong> {{ $member->desa ?? '-' }}</span>
                </div>
            </div>
        </div>

        {{-- Footer Aksi --}}
        <div class="bg-slate-50 p-6 border-t flex justify-end gap-3">
            <a href="{{ route('admin.members.print-form', $member->id) }}" 
            target="_blank" 
            class="px-6 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg text-sm font-bold shadow-sm hover:bg-slate-50">
                Cetak Form Pendaftaran
            </a>
            <a href="{{ route('admin.members.print', $member->id) }}" target="_blank" class="px-6 py-2 bg-slate-800 text-white rounded-lg text-sm font-bold shadow-sm">
                Cetak Kartu
            </a>
        </div>
    </div>
</div>
@endsection