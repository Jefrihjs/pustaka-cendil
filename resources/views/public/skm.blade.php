@extends('layouts.public')

@section('content')
{{-- Hero Section --}}
<section class="relative bg-slate-900 pt-32 pb-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
        <h1 class="text-4xl lg:text-5xl font-black text-white mb-4">Indeks Kepuasan <span class="text-blue-400">Masyarakat</span></h1>
        <p class="text-slate-400 max-w-2xl mx-auto italic">"Suara Anda adalah modal kami untuk mewujudkan Pustaka Cendil yang lebih inklusif dan berkualitas."</p>
    </div>
</section>

<section class="max-w-4xl mx-auto px-6 -mt-10 relative z-20 mb-20">
    <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 overflow-hidden">
        <div class="p-8 lg:p-12">
            <form action="{{ route('skm.store') }}" method="POST" class="space-y-12">
                @csrf

                {{-- 1. PERSYARATAN --}}
                <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">1. Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanan?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Tidak Sesuai', 'Kurang Sesuai', 'Sesuai', 'Sangat Sesuai'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u1" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 2. PROSEDUR --}}
                <div class="p-6 bg-white rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">2. Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Tidak Mudah', 'Kurang Mudah', 'Mudah', 'Sangat Mudah'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u2" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 3. WAKTU --}}
                <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">3. Bagaimana pendapat saudara tentang kecepatan waktu dalam memberikan layanan?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Tidak Cepat', 'Kurang Cepat', 'Cepat', 'Sangat Cepat'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u3" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 4. BIAYA (Sangat Penting untuk Transparansi) --}}
                <div class="p-6 bg-white rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">4. Bagaimana pendapat saudara tentang kewajiban tarif/biaya dalam pelayanan?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Sangat Mahal', 'Cukup Mahal', 'Murah', 'Gratis'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u4" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 5. KESESUAIAN PRODUK --}}
                <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">5. Bagaimana pendapat saudara tentang kesesuaian produk pelayanan antara standar dengan hasil?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Tidak Sesuai', 'Kurang Sesuai', 'Sesuai', 'Sangat Sesuai'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u5" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 6. KOMPETENSI --}}
                <div class="p-6 bg-white rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">6. Bagaimana pendapat saudara tentang kompetensi/kemampuan petugas dalam pelayanan?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Tidak Kompeten', 'Kurang Kompeten', 'Kompeten', 'Sangat Kompeten'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u6" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 7. PERILAKU --}}
                <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">7. Bagaimana pendapat saudara perilaku petugas terkait kesopanan dan keramahan?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Tidak Sopan', 'Kurang Sopan', 'Sopan', 'Sangat Sopan'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u7" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 8. SARPRAS --}}
                <div class="p-6 bg-white rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">8. Bagaimana pendapat saudara tentang kualitas sarana dan prasarana?</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach(['Buruk', 'Cukup', 'Baik', 'Sangat Baik'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u8" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-center py-3 px-2 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-xs peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                {{-- 9. PENGADUAN --}}
                <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <p class="text-slate-800 font-bold mb-6">9. Bagaimana pendapat saudara tentang penanganan pengaduan pengguna layanan?</p>
                    <div class="grid grid-cols-1 gap-3">
                        @foreach(['Tidak Ada', 'Ada Tetapi Tidak Berfungsi', 'Berfungsi Kurang Maksimal', 'Dikelola dengan Baik'] as $key => $opt)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="u9" value="{{ $key + 1 }}" class="peer hidden" required>
                            <div class="text-left py-3 px-6 rounded-xl border-2 border-slate-200 text-slate-500 font-bold text-sm peer-checked:border-blue-600 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all flex items-center gap-3">
                                <div class="w-4 h-4 rounded-full border-2 border-slate-300 peer-checked:border-blue-600 flex-shrink-0"></div>
                                {{ $opt }}
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-5 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-blue-900/20 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        Kirim Penilaian Masyarakat
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection