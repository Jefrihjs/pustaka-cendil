@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('content')
<div class="w-full space-y-8 pb-20">
    
    {{-- BARIS 1: 4 Statistik Utama Sejajar --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Total Anggota --}}
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <h3 class="text-2xl font-black text-slate-800">{{ $totalMembers }}</h3>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Anggota</p>
        </div>

        {{-- Anggota Aktif --}}
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-2xl font-black text-slate-800">{{ $activeMembers }}</h3>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Aktif</p>
        </div>

        {{-- Hasil Survei --}}
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/></svg>
                </div>
                <h3 class="text-2xl font-black text-slate-800">{{ $totalSurvei }}</h3>
            </div>
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Survei</p>
        </div>

        {{-- Kunjungan Hari Ini (Kartu Warna) --}}
        <div class="bg-gradient-to-br from-purple-600 to-indigo-700 p-6 rounded-[2rem] text-white shadow-lg shadow-indigo-200">
            <div class="flex justify-between items-center mb-2">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                </div>
                <h3 class="text-2xl font-black">{{ $kunjunganHariIni }}</h3>
            </div>
            <p class="text-[10px] font-medium opacity-80 uppercase tracking-widest">Kunjungan Hari Ini</p>
        </div>
    </div>

    {{-- Kartu Skor SKM --}}
    <div class="bg-white p-6 rounded-[2rem] border border-slate-200 shadow-sm relative overflow-hidden group">
        <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:opacity-20 transition-all">
            <svg class="w-20 h-20 text-rose-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
        </div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-black text-slate-800">{{ $nilaiSkm }}%</h3>
                    <p class="text-[10px] font-bold text-rose-500 uppercase tracking-tighter">Mutu Pelayanan</p>
                </div>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                <div class="bg-rose-500 h-full rounded-full" style="width: {{ $nilaiSkm }}%"></div>
            </div>
            <p class="mt-3 text-[10px] text-slate-400 font-medium italic">*Berdasarkan {{ $totalSkm }} responden</p>
        </div>
    </div>
    {{-- BARIS 2: GRAFIK (Wajib ada Canvas-nya!) --}}
    <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm">
        <h3 class="text-sm font-black text-slate-400 uppercase tracking-[0.2em] mb-6">Tren Kunjungan 7 Hari Terakhir</h3>
        <div class="h-[300px]">
            <canvas id="visitorChart"></canvas>
        </div>
    </div>

    {{-- BARIS 2: Aksi Cepat --}}
    <div>
        <h2 class="text-sm font-black text-slate-400 uppercase tracking-[0.3em] mb-6 ml-2">Manajemen Konten</h2>
        
        <div class="flex flex-wrap gap-6">
            
            {{-- Tombol Berita --}}
            <a href="{{ route('admin.posts.create') }}" class="flex-1 min-w-[200px] group p-6 bg-white border border-slate-200 rounded-[2.5rem] hover:border-emerald-500 transition-all shadow-sm">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-all mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5"/></svg>
                </div>
                <span class="block font-black text-slate-700 uppercase text-[10px] tracking-widest">Tulis Berita</span>
            </a>

            {{-- Tombol Foto --}}
            <a href="{{ route('admin.galleries.create') }}" class="flex-1 min-w-[200px] group p-6 bg-white border border-slate-200 rounded-[2.5rem] hover:border-blue-500 transition-all shadow-sm">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/></svg>
                </div>
                <span class="block font-black text-slate-700 uppercase text-[10px] tracking-widest">Upload Foto</span>
            </a>

            {{-- Tombol Video --}}
            <a href="{{ route('admin.videos.create') }}" class="flex-1 min-w-[200px] group p-6 bg-white border border-slate-200 rounded-[2.5rem] hover:border-red-500 transition-all shadow-sm">
                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center group-hover:bg-red-600 group-hover:text-white transition-all mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <span class="block font-black text-slate-700 uppercase text-[10px] tracking-widest">Tambah Video</span>
            </a>

            {{-- Tombol Survei --}}
            <a href="{{ route('admin.survei.index') }}" class="flex-1 min-w-[200px] group p-6 bg-white border border-slate-200 rounded-[2.5rem] hover:border-amber-500 transition-all shadow-sm">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center group-hover:bg-amber-600 group-hover:text-white transition-all mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/></svg>
                </div>
                <span class="block font-black text-slate-700 uppercase text-[10px] tracking-widest">Lihat Survei</span>
            </a>

        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitorChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            // Ambil label tanggal dari database
            labels: {!! json_encode($chartLabels) !!}, 
            datasets: [{
                label: 'Jumlah Pengunjung',
                // Ambil nilai jumlah dari database
                data: {!! json_encode($chartValues) !!}, 
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79, 70, 229, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#4f46e5'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { 
                y: { 
                    beginAtZero: true,
                    ticks: { stepSize: 1 } // Biar angkanya bulat (1, 2, 3...)
                } 
            }
        }
    });
</script>