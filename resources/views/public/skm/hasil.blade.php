@extends('layouts.public')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-6xl mx-auto px-6">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h2 class="text-3xl font-black text-slate-800 uppercase italic tracking-tighter">
                    Laporan Hasil Survei Kepuasan
                </h2>
                <p class="text-slate-500 text-sm">Data transparansi layanan Pustaka Cendil</p>
            </div>

            {{-- TOMBOL DOWNLOAD PDF --}}
            <a href="{{ route('admin.skm.pdf') }}" 
            class="flex items-center gap-2 bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-rose-200 transition-all active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                DOWNLOAD PDF
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- KIRI: NILAI IKM (Mirip Gambar 7) --}}
            <div class="bg-white rounded-[2rem] shadow-xl p-8 border border-slate-100 flex flex-col items-center text-center">
                <h3 class="text-slate-400 font-bold uppercase text-xs tracking-widest mb-6">Nilai IKM</h3>
                <div class="relative flex items-center justify-center w-48 h-48 border-[12px] border-slate-100 rounded-full">
                    <span class="text-6xl font-black text-slate-900">{{ number_format($ikm, 2) }}</span>
                </div>
                <div class="mt-8">
                    <p class="text-sm font-medium text-slate-500">Mutu Pelayanan:</p>
                    <h4 class="text-4xl font-black {{ $warna }}">{{ $mutu }}</h4>
                    <p class="font-bold text-slate-700 uppercase mt-1">({{ $kinerja }})</p>
                </div>
            </div>

            {{-- TENGAH: GRAFIK (Mirip Gambar 9 - Pakai Chart.js) --}}
            <div class="lg:col-span-2 bg-white rounded-[2rem] shadow-sm p-8 border border-slate-100">
                <h3 class="text-slate-800 font-bold mb-6">Statistik Kepuasan Responden</h3>
                <canvas id="skmChart" height="150"></canvas>
            </div>

            {{-- BAWAH: PROFIL RESPONDEN (Mirip Gambar 8) --}}
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase">Responden Pria</p>
                        <h4 class="text-2xl font-black text-slate-800">{{ $respondenPria }} Orang</h4>
                    </div>
                    <div class="p-4 bg-blue-50 text-blue-500 rounded-full">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase">Responden Wanita</p>
                        <h4 class="text-2xl font-black text-slate-800">{{ $respondenWanita }} Orang</h4>
                    </div>
                    <div class="p-4 bg-pink-50 text-pink-500 rounded-full">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- SCRIPT UNTUK GRAFIK --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('skmChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['U1', 'U2', 'U3', 'U4', 'U5', 'U6', 'U7', 'U8', 'U9'],
            datasets: [{
                label: 'Nilai Rata-rata Unsur',
                data: @json($grafikData),
                backgroundColor: '#8b5cf6', // Warna ungu mirip Gambar 8
                borderRadius: 8,
            }]
        },
        options: {
            scales: { y: { min: 1, max: 4 } } // Skala tetap 1-4
        }
    });
</script>
@endsection