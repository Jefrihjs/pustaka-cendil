@extends('layouts.admin')

@section('title', 'Manajemen User')

@section('content')
{{-- Tambahkan x-data di sini untuk kontrol Modal --}}
<div class="space-y-8" x-data="{ confirmDelete: false, deleteUrl: '', userName: '' }">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Manajemen User Admin</h1>
            <p class="text-sm text-slate-500 font-medium">Kelola hak akses admin Pustaka Cendil.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-500 transition-all active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            Tambah Admin Baru
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-widest">Nama</th>
                    <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-widest">Email</th>
                    <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($users as $user)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-5 text-sm font-bold text-slate-700">{{ $user->name }}</td>
                    <td class="px-6 py-5 text-sm text-slate-500 font-medium">{{ $user->email }}</td>
                    <td class="px-6 py-5 text-center">
                        <div class="flex items-center justify-center gap-4">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-800 font-black text-xs uppercase tracking-widest">Edit</a>
                            
                            @if(auth()->id() !== $user->id)
                            {{-- Ganti tombol hapus jadi trigger Alpine.js --}}
                            <button type="button" 
                                @click="confirmDelete = true; deleteUrl = '{{ route('admin.users.destroy', $user->id) }}'; userName = '{{ $user->name }}'"
                                class="text-red-500 hover:text-red-700 font-bold text-xs uppercase tracking-tighter">
                                Hapus
                            </button>
                            @else
                            <span class="text-xs text-slate-300 italic font-medium">Login Saat Ini</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MODAL KONFIRMASI HAPUS MODERN --}}
    <div x-show="confirmDelete" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="confirmDelete = false"></div>
        <div class="relative bg-white rounded-[2.5rem] p-10 max-w-md w-full text-center shadow-2xl border border-slate-100" 
             x-show="confirmDelete" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">
            
            <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-100/50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            
            <h3 class="text-2xl font-black text-slate-800 mb-2">Hapus Admin?</h3>
            <p class="text-sm text-slate-500 mb-8 font-medium">
                Apakah Anda yakin ingin menghapus <span class="text-red-600 font-bold" x-text="userName"></span>? Hak akses admin akan dicabut selamanya.
            </p>
            
            <div class="flex gap-4">
                <button @click="confirmDelete = false" class="flex-1 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">Batal</button>
                <form :action="deleteUrl" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-4 bg-red-600 text-white rounded-2xl font-black uppercase hover:bg-red-700 shadow-xl shadow-red-200 transition-all">Ya, Hapus!</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection