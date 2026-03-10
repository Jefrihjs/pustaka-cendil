@extends('layouts.admin')

@section('title', 'Tambah Anggota')

@section('content')
<div class="p-6 bg-slate-50 min-h-screen">
    <div class="max-w-3xl mx-auto">

        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-800">Tambah Anggota Baru</h1>
            <p class="text-slate-500">Gunakan form ini untuk mendaftarkan anggota secara manual.</p>
        </div>

        {{-- Error handling identik dengan publik --}}
        @if ($errors->any())
        <div class="mb-6 bg-rose-100 border border-rose-200 text-rose-700 px-4 py-3 rounded-xl shadow-sm">
            <ul class="list-disc ml-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.members.store') }}" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-10">
            @csrf

            {{-- IDENTITAS --}}
            <section>
                <h3 class="text-lg font-semibold text-slate-700 mb-6 flex items-center">
                    <span class="w-7 h-7 bg-slate-900 text-white rounded-full flex items-center justify-center text-xs mr-3">1</span>
                    Identitas Pribadi
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-600 mb-2">Nama Lengkap *</label>
                        <input type="text" name="nama" required value="{{ old('nama') }}"
                               class="w-full border border-slate-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-slate-900 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                               class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                               class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-600 mb-2">Jenis Kelamin</label>
                        <div class="flex gap-6 mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} class="text-slate-900 focus:ring-slate-900">
                                <span class="ml-2 text-sm text-slate-700">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} class="text-slate-900 focus:ring-slate-900">
                                <span class="ml-2 text-sm text-slate-700">Perempuan</span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="border-slate-100">

            {{-- PEKERJAAN/PENDIDIKAN --}}
            <section>
                <h3 class="text-lg font-semibold text-slate-700 mb-6 flex items-center">
                    <span class="w-7 h-7 bg-slate-900 text-white rounded-full flex items-center justify-center text-xs mr-3">2</span>
                    Latar Belakang
                </h3>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-600 mb-2">Kategori Pendaftar *</label>
                    <select name="kategori_pekerjaan" id="kategori_pekerjaan" onchange="toggleFields()" required
                            class="w-full border border-slate-300 rounded-lg px-4 py-2.5 bg-slate-50">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="umum" {{ old('kategori_pekerjaan') == 'umum' ? 'selected' : '' }}>Umum / Swasta</option>
                        <option value="asn" {{ old('kategori_pekerjaan') == 'asn' ? 'selected' : '' }}>ASN / Pegawai Negeri</option>
                        <option value="mahasiswa" {{ old('kategori_pekerjaan') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="siswa" {{ old('kategori_pekerjaan') == 'siswa' ? 'selected' : '' }}>Siswa Sekolah</option>
                    </select>
                </div>

                <div id="dynamic_fields" class="space-y-4 bg-slate-50 p-4 rounded-xl border border-dashed border-slate-200 hidden">
                    <div id="field_umum" class="hidden space-y-4">
                        <input type="text" name="sektor" value="{{ old('sektor') }}" placeholder="Sektor (Contoh: Teknologi)" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="instansi" value="{{ old('instansi') }}" placeholder="Nama Perusahaan" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>

                    <div id="field_asn" class="hidden space-y-4">
                        <input type="text" name="instansi" value="{{ old('instansi') }}" placeholder="Nama Instansi/Dinas" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>

                    <div id="field_mahasiswa" class="hidden space-y-4">
                        <input type="text" name="instansi" value="{{ old('instansi') }}" placeholder="Nama Universitas" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="fakultas" value="{{ old('fakultas') }}" placeholder="Fakultas / Jurusan" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>

                    <div id="field_siswa" class="hidden space-y-4">
                        <input type="text" name="instansi" value="{{ old('instansi') }}" placeholder="Nama Sekolah" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="kelas" value="{{ old('kelas') }}" placeholder="Kelas (Contoh: 10 IPA 1)" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>

                    <textarea name="alamat_instansi" placeholder="Alamat Instansi/Sekolah Lengkap" class="w-full border border-slate-300 rounded-lg px-4 py-2.5 h-20">{{ old('alamat_instansi') }}</textarea>
                </div>
            </section>

            <hr class="border-slate-100">

            {{-- KONTAK & ALAMAT --}}
            <section>
                <h3 class="text-lg font-semibold text-slate-700 mb-6 flex items-center">
                    <span class="w-7 h-7 bg-slate-900 text-white rounded-full flex items-center justify-center text-xs mr-3">3</span>
                    Kontak & Alamat
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">No. WhatsApp/HP</label>
                        <input type="tel" name="no_hp" value="{{ old('no_hp') }}" placeholder="0812xxxx"
                               class="w-full border border-slate-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-slate-900 outline-none">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Alamat Rumah Lengkap</label>
                        <textarea name="alamat_rumah" placeholder="Nama Jalan, No Rumah, dll" 
                                  class="w-full border border-slate-300 rounded-lg px-4 py-2.5 h-20">{{ old('alamat_rumah') }}</textarea>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <input type="text" name="rt" value="{{ old('rt') }}" placeholder="RT" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="rw" value="{{ old('rw') }}" placeholder="RW" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="desa" value="{{ old('desa') }}" placeholder="Desa" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>
                </div>
            </section>

            <div class="pt-6 flex justify-end gap-4">
                <button type="reset" class="px-6 py-3 text-sm font-semibold text-slate-600 hover:text-slate-800">Reset</button>
                <button type="submit" class="bg-slate-900 text-white px-10 py-3 rounded-xl font-bold hover:bg-slate-800 transition shadow-lg">
                    Simpan Anggota
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function toggleFields() {
    const kategori = document.getElementById("kategori_pekerjaan").value;
    const dynamicWrapper = document.getElementById("dynamic_fields");
    const sections = ["field_umum", "field_asn", "field_mahasiswa", "field_siswa"];

    sections.forEach(id => {
        const section = document.getElementById(id);
        if (section) {
            section.classList.add("hidden");
            section.querySelectorAll("input, textarea").forEach(el => el.disabled = true);
        }
    });

    if (kategori) {
        dynamicWrapper.classList.remove("hidden");
        const active = document.getElementById("field_" + kategori);
        if (active) {
            active.classList.remove("hidden");
            active.querySelectorAll("input, textarea").forEach(el => el.disabled = false);
        }
    } else {
        dynamicWrapper.classList.add("hidden");
    }
}
window.onload = toggleFields;
</script>
@endsection