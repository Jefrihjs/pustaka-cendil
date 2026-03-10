@extends('layouts.admin')

@section('title', 'Dashboard Utama')

@section('content')
{{-- Gunakan w-full untuk memastikan dia memakai seluruh ruang yang tersedia --}}
<div class="w-full space-y-12 pb-20">
    
    {{-- BARIS 1: Statistik Utama --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- Total Anggota --}}
        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <h3 class="text-4xl font-black text-slate-800">{{ $totalMembers }}</h3>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Total Anggota</p>
        </div>

        {{-- Anggota Aktif --}}
        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-4xl font-black text-slate-800">{{ $activeMembers }}</h3>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Anggota Aktif</p>
        </div>

        {{-- Hasil Survei --}}
        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/></svg>
                </div>
                <h3 class="text-4xl font-black text-slate-800">{{ $totalSurvei }}</h3>
            </div>
            <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Survei Masuk</p>
        </div>
    </div>

    {{-- BARIS 2: Aksi Cepat (Penyebab Menumpuk Ada di Sini) --}}
    <div>
        <h2 class="text-sm font-black text-slate-400 uppercase tracking-[0.3em] mb-6 ml-2">Manajemen Konten</h2>
        
        {{-- Kita gunakan flex-wrap sebagai cadangan jika grid gagal --}}
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