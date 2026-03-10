<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu - Pustaka Cendil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="max-w-md mx-auto min-h-screen flex flex-col p-6">
        
        <div class="text-center mt-8 mb-10">
            <div class="mb-4 flex items-center justify-center">
                <img src="{{ asset('images/logo-pustaka.png') }}" alt="Logo Pustaka Cendil" class="w-24 h-auto drop-shadow-lg">
            </div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight">Pustaka Cendil</h1>
            <p class="text-[10px] font-bold text-rose-600 uppercase tracking-[0.3em] mb-1">Tige Kubok</p>
            <p class="text-slate-500 font-medium text-sm">Selamat Datang! Silakan isi buku tamu.</p>
        </div>

        <form action="{{ route('buku.tamu.store') }}" method="POST" class="space-y-4 flex-1">
            @csrf
            <div>
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full bg-white border-2 border-slate-100 rounded-2xl p-4 mt-1 focus:border-rose-500 outline-none transition-all shadow-sm">
            </div>

            <div>
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" required class="w-full bg-white border-2 border-slate-100 rounded-2xl p-4 mt-1 focus:border-rose-500 outline-none transition-all shadow-sm appearance-none">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Tujuan Kunjungan</label>
                <div class="relative">
                    <select name="tujuan" required 
                        class="w-full bg-white border-2 border-slate-100 rounded-2xl p-4 mt-1 focus:border-rose-500 outline-none transition-all shadow-sm appearance-none text-slate-700 font-medium">
                        <option value="" disabled selected>Pilih Tujuan...</option>
                        <option value="Baca Buku">Baca Buku / Referensi</option>
                        <option value="Pinjam/Kembali">Pinjam atau Kembali Buku</option>
                        <option value="Internet/WiFi">Akses Internet / WiFi</option>
                        <option value="Diskusi/Kegiatan">Diskusi / Mengikuti Kegiatan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none mt-1">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div>
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Instansi/Sekolah (Opsional)</label>
                <input type="text" name="instansi" class="w-full bg-white border-2 border-slate-100 rounded-2xl p-4 mt-1 focus:border-rose-500 outline-none transition-all shadow-sm">
            </div>

            <button type="submit" class="w-full bg-rose-600 text-white font-black py-5 rounded-[2rem] shadow-xl shadow-rose-200 hover:bg-rose-700 transition-all active:scale-95 mt-4">
                Simpan Kehadiran
            </button>
        </form>

        <footer class="py-8 text-center text-slate-300 text-[10px] font-bold uppercase tracking-widest">
            &copy; 2026 Pustaka Cendil Tige Kubok
        </footer>
    </div>

    @if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#e11d48',
            customClass: { popup: 'rounded-[2rem]' }
        });
    </script>
    @endif
</body>
</html>