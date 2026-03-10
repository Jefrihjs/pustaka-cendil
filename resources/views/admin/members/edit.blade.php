@extends('layouts.admin')

@section('title', 'Edit Data Anggota')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- Breadcrumb/Back Button --}}
    <div class="mb-6">
        <a href="{{ route('admin.members.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Anggota
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-8">
            <div class="mb-8">
                <h3 class="text-xl font-bold text-slate-800">Perbarui Informasi Anggota</h3>
                <p class="text-sm text-slate-500">Pastikan data yang dimasukkan sudah sesuai dengan identitas asli.</p>
            </div>

            <form action="{{ route('admin.members.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $member->nama) }}" 
                               class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition px-4 py-2.5" required>
                    </div>

                    {{-- No HP --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">No. HP/WhatsApp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $member->no_hp) }}" 
                               class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $member->tempat_lahir) }}" 
                               class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $member->tanggal_lahir) }}" 
                               class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">
                            <option value="L" {{ $member->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $member->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    {{-- Kategori Pekerjaan --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Kategori Pekerjaan</label>
                        <select name="kategori_pekerjaan" id="kategori_pekerjaan" onchange="toggleFields()" 
                                class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">
                            <option value="umum" {{ $member->kategori_pekerjaan == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="asn" {{ $member->kategori_pekerjaan == 'asn' ? 'selected' : '' }}>ASN/PNS</option>
                            <option value="mahasiswa" {{ $member->kategori_pekerjaan == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="siswa" {{ $member->kategori_pekerjaan == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        </select>
                    </div>
                </div>

                {{-- Extra Fields --}}
                <div id="extra_fields" class="mt-6 p-6 bg-slate-50 rounded-2xl border border-slate-100 {{ $member->kategori_pekerjaan == 'umum' ? 'hidden' : '' }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label id="label_instansi" class="block text-sm font-bold text-slate-700 mb-2">Nama Instansi</label>
                            <input type="text" name="instansi" value="{{ old('instansi', $member->instansi) }}" 
                                   class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">
                        </div>
                        <div id="div_kelas" class="{{ $member->kategori_pekerjaan == 'siswa' ? '' : 'hidden' }}">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Kelas</label>
                            <input type="text" name="kelas" value="{{ old('kelas', $member->kelas) }}" 
                                   class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">
                        </div>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="mt-6">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Rumah Lengkap</label>
                    <textarea name="alamat_rumah" rows="3" 
                              class="w-full border-slate-200 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5">{{ old('alamat_rumah', $member->alamat_rumah) }}</textarea>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end gap-3 mt-10 pt-6 border-t border-slate-100">
                    <a href="{{ route('admin.members.index') }}" 
                       class="bg-slate-100 text-slate-600 px-8 py-2.5 rounded-xl font-bold hover:bg-slate-200 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="bg-indigo-600 text-white px-8 py-2.5 rounded-xl font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleFields() {
        const kategori = document.getElementById('kategori_pekerjaan').value;
        const extraFields = document.getElementById('extra_fields');
        const divKelas = document.getElementById('div_kelas');
        const labelInstansi = document.getElementById('label_instansi');

        if (kategori === 'umum') {
            extraFields.classList.add('hidden');
        } else {
            extraFields.classList.remove('hidden');
            divKelas.classList.add('hidden');
            
            if (kategori === 'asn') labelInstansi.innerText = 'Nama Instansi/Kantor';
            if (kategori === 'mahasiswa') labelInstansi.innerText = 'Nama Kampus/Universitas';
            if (kategori === 'siswa') {
                labelInstansi.innerText = 'Nama Sekolah';
                divKelas.classList.remove('hidden');
            }
        }
    }
    window.onload = toggleFields;
</script>
@endsection