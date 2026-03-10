@extends('layouts.public')

@section('content')
<div class="pt-32 pb-20 bg-slate-50 min-h-screen" x-data="{ step: 1 }">
    <div class="max-w-4xl mx-auto px-6">
        
        {{-- Progress Header --}}
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-black text-slate-800 uppercase tracking-tighter mb-2">Survey SKM</h1>
            <p class="text-slate-500 font-medium">Pustaka Cendil - Desa Cendil</p>
            
            <div class="flex items-center justify-center gap-4 mt-8">
                <div class="flex items-center gap-2">
                    <div :class="step >= 1 ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-400'" class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-black transition-all">1</div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Profil</span>
                </div>
                <div class="w-12 h-px bg-slate-200"></div>
                <div class="flex items-center gap-2">
                    <div :class="step >= 2 ? 'bg-emerald-600 text-white' : 'bg-slate-200 text-slate-400'" class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-black transition-all">2</div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Kuesioner</span>
                </div>
            </div>
        </div>

        <form action="{{ route('skm.store') }}" method="POST" class="bg-white rounded-[3rem] shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
            @csrf

            {{-- STEP 1: PROFIL RESPONDEN --}}
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" class="p-10 md:p-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Email --}}
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3">Alamat Email</label>
                        <input type="email" name="email" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none font-bold text-slate-700" placeholder="contoh@email.com">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none font-bold text-slate-700">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    {{-- Umur --}}
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3">Rentang Umur</label>
                        <select name="umur" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none font-bold text-slate-700">
                            <option value="15-20 Tahun">15 - 20 Tahun</option>
                            <option value="21-30 Tahun">21 - 30 Tahun</option>
                            <option value="31-40 Tahun">31 - 40 Tahun</option>
                            <option value="> 40 Tahun">> 40 Tahun</option>
                        </select>
                    </div>

                    {{-- Pendidikan --}}
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3">Pendidikan Terakhir</label>
                        <select name="pendidikan" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none font-bold text-slate-700">
                            <option value="SD">SD</option>
                            <option value="SMP">SMP / SLTP</option>
                            <option value="SMA">SMA / SLTA</option>
                            <option value="Diploma">Diploma (D1/D2/D3)</option>
                            <option value="Sarjana">Sarjana (S1)</option>
                            <option value="Pascasarjana">Pascasarjana (S2/S3)</option>
                        </select>
                    </div>

                    {{-- Pekerjaan --}}
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3">Pekerjaan</label>
                        <select name="pekerjaan" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none font-bold text-slate-700">
                            <option value="PNS/TNI/Polri">PNS / TNI / POLRI</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Pelajar/Mahasiswa">Pelajar / Mahasiswa</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <button type="button" @click="step = 2" class="w-full mt-12 py-5 bg-slate-900 text-white rounded-2xl font-black uppercase tracking-widest shadow-xl hover:bg-slate-800 transition-all active:scale-95 flex items-center justify-center gap-3">
                    Lanjut ke Pertanyaan
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </button>
            </div>

            {{-- STEP 2: KUESIONER 9 UNSUR --}}
            <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" class="p-10 md:p-16 space-y-12">
                
                @php
                    $pertanyaan = [
                        'u1' => 'Bagaimana pemahaman Anda tentang persyaratan pelayanan di Pustaka Cendil?',
                        'u2' => 'Bagaimana pendapat Anda tentang kemudahan prosedur pelayanan di sini?',
                        'u3' => 'Bagaimana pendapat Anda tentang kecepatan waktu dalam memberikan pelayanan?',
                        'u4' => 'Bagaimana pendapat Anda tentang kewajaran biaya/tarif dalam pelayanan (Gratis)?',
                        'u5' => 'Bagaimana pendapat Anda tentang kesesuaian produk pelayanan antara yang dijanjikan dengan yang diberikan?',
                        'u6' => 'Bagaimana pendapat Anda tentang kompetensi/kemampuan petugas dalam pelayanan?',
                        'u7' => 'Bagaimana sikap petugas dalam memberikan pelayanan (Sopan & Ramah)?',
                        'u8' => 'Bagaimana kualitas sarana dan prasarana (Ruangan, Buku, Komputer)?',
                        'u9' => 'Bagaimana pendapat Anda tentang penanganan pengaduan pengguna layanan?'
                    ];
                @endphp

                @foreach($pertanyaan as $key => $teks)
                <div class="space-y-4">
                    <h3 class="text-sm font-black text-slate-800 leading-relaxed uppercase tracking-tight">{{ $loop->iteration }}. {{ $teks }}</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        @foreach([1 => 'Buruk', 2 => 'Cukup', 3 => 'Baik', 4 => 'Sangat Baik'] as $val => $label)
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="{{ $key }}" value="{{ $val }}" required class="peer hidden">
                            <div class="p-4 text-center bg-slate-50 border-2 border-slate-100 rounded-2xl peer-checked:border-emerald-500 peer-checked:bg-emerald-50 transition-all group-hover:bg-white group-hover:shadow-md">
                                <span class="block text-[10px] font-black uppercase tracking-widest text-slate-400 peer-checked:text-emerald-600 mb-1">Skor {{ $val }}</span>
                                <span class="block text-xs font-bold text-slate-700">{{ $label }}</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <div class="pt-8 border-t border-slate-100">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-3">Saran & Masukan (Opsional)</label>
                    <textarea name="saran" rows="4" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 outline-none font-bold text-slate-700" placeholder="Tuliskan saran Anda untuk kemajuan Pustaka Cendil..."></textarea>
                </div>

                <div class="flex gap-4">
                    <button type="button" @click="step = 1" class="flex-1 py-5 bg-slate-100 text-slate-600 rounded-2xl font-black uppercase tracking-widest hover:bg-slate-200 transition-all">Kembali</button>
                    <button type="submit" class="flex-[2] py-5 bg-emerald-600 text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-emerald-200 hover:bg-emerald-700 transition-all active:scale-95">Kirim Survey</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection