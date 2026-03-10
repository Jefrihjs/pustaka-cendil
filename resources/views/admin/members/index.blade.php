@extends('layouts.admin')

@section('title', 'Data Anggota')

@section('content')
{{-- Notifikasi Sukses --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

<div class="bg-white rounded-xl shadow overflow-visible">
    <div class="px-6 py-4 border-b flex justify-between items-center">
        <h2 class="font-semibold text-slate-700">Data Anggota Pustaka Cendil</h2>
        <a href="{{ route('admin.members.create') }}"
           class="bg-slate-900 text-white px-4 py-2 rounded-lg text-sm hover:bg-slate-800 transition">
            + Tambah Anggota
        </a>
    </div>

    <div class="overflow-visible">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b">
                <tr>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase">Nama & Kode</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase">Kategori</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase">Status</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr class="border-b hover:bg-slate-50/50">
                    <td class="p-4">
                        <div class="font-bold text-slate-700">{{ $member->nama }}</div>
                        <div class="text-xs text-slate-400">{{ $member->kode_anggota }}</div>
                    </td>
                    <td class="p-4 text-sm text-slate-600 capitalize">{{ $member->kategori_pekerjaan }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 rounded-full text-xs font-bold {{ $member->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ strtoupper($member->status) }}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex justify-center items-center gap-2">
                            {{-- Lihat --}}
                            <a href="{{ route('admin.members.show', $member->id) }}" 
                            class="bg-blue-50 text-blue-600 px-3 py-1.5 rounded border border-blue-200 text-xs font-bold hover:bg-blue-100">
                                LIHAT
                            </a>
                            {{-- Edit --}}
                            <a href="{{ route('admin.members.edit', $member->id) }}" 
                               class="bg-amber-50 text-amber-600 px-3 py-1.5 rounded border border-amber-200 text-xs font-bold hover:bg-amber-100">
                                EDIT
                            </a>

                            {{-- Tombol Terima (Pakai SweetAlert) --}}
                            @if($member->status == 'pending')
                            <form id="activate-form-{{ $member->id }}" action="{{ route('admin.members.activate', $member->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="button" onclick="confirmActivate('{{ $member->id }}', '{{ $member->nama }}')"
                                        class="bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded border border-emerald-200 text-xs font-bold hover:bg-emerald-100">
                                    TERIMA
                                </button>
                            </form>
                            @endif

                            {{-- Hapus --}}
                            <form id="delete-form-{{ $member->id }}" action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $member->id }}', '{{ $member->nama }}')"
                                        class="bg-red-50 text-red-600 px-3 py-1.5 rounded border border-red-200 text-xs font-bold hover:bg-red-100">
                                    HAPUS
                                </button>
                            </form>

                            {{-- DROPDOWN CETAK (SISTEM KLIK) --}}
                            <div class="relative inline-block text-left">
                                <button type="button" onclick="toggleDropdown('dropdown-{{ $member->id }}')" 
                                        class="bg-slate-800 text-white px-3 py-1.5 rounded text-xs font-bold hover:bg-slate-700 flex items-center gap-1">
                                    CETAK ▾
                                </button>
                                
                                {{-- Menu Dropdown --}}
                                <div id="dropdown-{{ $member->id }}" 
                                     class="hidden absolute right-0 bottom-full mb-2 w-40 bg-white border border-slate-200 rounded-lg shadow-2xl z-[9999] overflow-hidden">
                                    <a href="{{ route('admin.members.print', $member->id) }}" target="_blank" 
                                       class="block px-4 py-2.5 text-xs text-slate-700 hover:bg-indigo-600 hover:text-white border-b border-slate-100">
                                       📇 Kartu Anggota
                                    </a>
                                    <a href="{{ route('admin.members.print-form', $member->id) }}" target="_blank" 
                                       class="block px-4 py-2.5 text-xs text-slate-700 hover:bg-indigo-600 hover:text-white">
                                       📝 Form Pendaftaran
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
    // Fungsi untuk Dropdown Cetak
    function toggleDropdown(id) {
        // Tutup semua dropdown lain yang mungkin sedang terbuka
        document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
            if (el.id !== id) el.classList.add('hidden');
        });
        
        // Toggle dropdown yang diklik
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
    }

    // Klik di luar dropdown untuk menutup
    window.onclick = function(event) {
        if (!event.target.matches('button')) {
            document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
                el.classList.add('hidden');
            });
        }
    }

    // Fungsi Konfirmasi Hapus SweetAlert
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Yakin Hapus?',
            text: "Data anggota " + name + " akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }

    function confirmActivate(id, name) {
        Swal.fire({
            title: 'Terima Anggota?',
            text: "Anggota " + name + " akan segera diaktifkan.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981', // Warna hijau emerald
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Terima!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('activate-form-' + id).submit();
            }
        })
    }
</script>
@endsection