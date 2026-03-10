@extends('layouts.admin')

@section('title', 'Edit User Admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-black text-slate-800 tracking-tight">Edit Data Admin</h1>
        <p class="text-sm text-slate-500 font-medium italic">Ubah informasi akun atau perbarui password.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-[2.5rem] p-8 md:p-12 shadow-sm">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 outline-none font-bold text-slate-700">
            </div>

            <div>
                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 outline-none font-bold text-slate-700">
            </div>

            <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100 flex gap-3 items-start">
                <span class="text-xl">💡</span>
                <p class="text-xs text-amber-700 font-bold leading-relaxed">
                    Jika tidak ingin mengganti password, biarkan kolom password di bawah ini kosong.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Password Baru</label>
                    <input type="password" name="password" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 outline-none font-bold text-slate-700">
                </div>
                <div>
                    <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 outline-none font-bold text-slate-700">
                </div>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('admin.users.index') }}" class="flex-1 text-center py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">Batal</a>
                <button type="submit" class="flex-1 py-4 bg-indigo-600 text-white rounded-2xl font-black uppercase hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection