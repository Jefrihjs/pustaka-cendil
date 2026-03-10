@extends('layouts.public')

@section('title', 'Formulir Pendaftaran Anggota')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

<style>
    /* CUSTOM CSS BIAR MEWAH */
    .ts-control {
        border-radius: 0.5rem !important; /* rounded-lg */
        padding: 0.625rem 1rem !important; /* px-4 py-2.5 */
        border: 1px solid #cbd5e1 !important; /* border-slate-300 */
        background-color: #ffffff !important;
        font-size: 0.875rem !important; /* text-sm */
        line-height: 1.25rem !important;
        min-height: 45px !important; /* Biar tingginya sama dengan input nama */
        display: flex;
        align-items: center;
    }

    .ts-wrapper {
        width: 100% !important;
        margin-bottom: 5px;
    }

    .ts-wrapper.focus .ts-control {
        box-shadow: 0 0 0 2px #0f172a !important; /* focus:ring-slate-900 */
        border-color: #0f172a !important;
    }

    .ts-dropdown {
        border-radius: 0.5rem !important;
        margin-top: 5px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1) !important;
    }

    .flatpickr-calendar { border-radius: 1rem !important; box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1) !important; }
</style>

<div class="min-h-screen bg-slate-50 py-16">
    <div class="max-w-3xl mx-auto px-6">

        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-slate-800">Formulir Pendaftaran Anggota</h1>
            <p class="text-slate-500 mt-2">Bergabunglah dengan komunitas literasi Pustaka Cendil.</p>
        </div>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="mb-6 bg-emerald-100 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('public.members.store') }}" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-10">
            @csrf

            {{-- 1. IDENTITAS --}}
            <section>
                <div class="flex items-center mb-6">
                    <span class="w-8 h-8 bg-slate-900 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">1</span>
                    <h3 class="text-lg font-semibold text-slate-700">Identitas Pribadi</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-600 mb-2">Nama Lengkap *</label>
                        <input type="text" name="nama" required value="{{ old('nama') }}"
                               class="w-full border border-slate-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-slate-900 outline-none transition shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Tempat Lahir *</label>
                        <input type="text" name="tempat_lahir" required value="{{ old('tempat_lahir') }}"
                               class="w-full border border-slate-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-slate-900 outline-none shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-2">Tanggal Lahir *</label>
                        <div class="relative">
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" required 
                                   placeholder="Pilih Tanggal" value="{{ old('tanggal_lahir') }}"
                                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 bg-white cursor-pointer outline-none">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-600 mb-2">Jenis Kelamin *</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} class="text-slate-900">
                                <span class="ml-2 text-sm text-slate-700">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} class="text-slate-900">
                                <span class="ml-2 text-sm text-slate-700">Perempuan</span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="border-slate-100">

            {{-- 2. LATAR BELAKANG --}}
            <section>
                <div class="flex items-center mb-6">
                    <span class="w-8 h-8 bg-slate-900 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">2</span>
                    <h3 class="text-lg font-semibold text-slate-700">Latar Belakang</h3>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-600 mb-2">Kategori Pendaftar *</label>
                    <select name="kategori_pekerjaan" id="kategori_pekerjaan" required class="w-full">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="umum" {{ old('kategori_pekerjaan') == 'umum' ? 'selected' : '' }}>Umum / Swasta</option>
                        <option value="asn" {{ old('kategori_pekerjaan') == 'asn' ? 'selected' : '' }}>ASN / Pegawai Negeri</option>
                        <option value="mahasiswa" {{ old('kategori_pekerjaan') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="siswa" {{ old('kategori_pekerjaan') == 'siswa' ? 'selected' : '' }}>Siswa Sekolah</option>
                    </select>
                </div>

                <div id="dynamic_fields" class="space-y-4 bg-slate-50 p-4 rounded-xl border border-dashed border-slate-200 hidden">
                    <div id="field_umum" class="hidden space-y-4">
                        <input type="text" name="sektor" placeholder="Sektor (Contoh: Perbankan)" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="instansi" placeholder="Nama Perusahaan" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>
                    <div id="field_asn" class="hidden space-y-4">
                        <input type="text" name="instansi" placeholder="Nama Instansi/Dinas" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>
                    <div id="field_mahasiswa" class="hidden space-y-4">
                        <input type="text" name="instansi" placeholder="Nama Universitas" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="fakultas" placeholder="Fakultas / Jurusan" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>
                    <div id="field_siswa" class="hidden space-y-4">
                        <input type="text" name="instansi" placeholder="Nama Sekolah" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="kelas" placeholder="Kelas" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>
                    <textarea name="alamat_instansi" placeholder="Alamat Instansi Lengkap" class="w-full border border-slate-300 rounded-lg px-4 py-2.5 h-20">{{ old('alamat_instansi') }}</textarea>
                </div>
            </section>

            <hr class="border-slate-100">

            {{-- 3. KONTAK & ALAMAT --}}
            <section>
                <div class="flex items-center mb-6">
                    <span class="w-8 h-8 bg-slate-900 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">3</span>
                    <h3 class="text-lg font-semibold text-slate-700">Kontak & Alamat</h3>
                </div>
                <div class="space-y-4">
                    <input type="tel" name="no_hp" required placeholder="No. WhatsApp (Contoh: 0812...)" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    <textarea name="alamat_rumah" required placeholder="Alamat Rumah Lengkap" class="w-full border border-slate-300 rounded-lg px-4 py-2.5 h-24">{{ old('alamat_rumah') }}</textarea>
                    <div class="grid grid-cols-3 gap-4">
                        <input type="text" name="rt" placeholder="RT" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="rw" placeholder="RW" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                        <input type="text" name="desa" placeholder="Desa" class="w-full border border-slate-300 rounded-lg px-4 py-2.5">
                    </div>
                </div>
            </section>

            <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl hover:bg-slate-800 transition-all shadow-lg">
                Daftar Sekarang
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

<script>
    // 1. Tom Select
    var ts = new TomSelect("#kategori_pekerjaan", { create: false, controlInput: null });

    // 2. Flatpickr
    flatpickr("#tanggal_lahir", { locale: "id", dateFormat: "d-m-Y", altInput: true, altFormat: "j F Y" });

    // 3. Logic Toggle Field Dinamis
    function toggleFields(val) {
        const kategori = val || ts.getValue();
        const wrapper = document.getElementById("dynamic_fields");
        const sections = ["field_umum", "field_asn", "field_mahasiswa", "field_siswa"];

        sections.forEach(id => {
            const section = document.getElementById(id);
            section.classList.add("hidden");
            section.querySelectorAll("input").forEach(el => el.disabled = true);
        });

        if (kategori) {
            wrapper.classList.remove("hidden");
            const active = document.getElementById("field_" + kategori);
            if (active) {
                active.classList.remove("hidden");
                active.querySelectorAll("input").forEach(el => el.disabled = false);
            }
        } else {
            wrapper.classList.add("hidden");
        }
    }

    ts.on('change', function(value) { toggleFields(value); });
    window.onload = function() { toggleFields(); };
</script>
@endsection