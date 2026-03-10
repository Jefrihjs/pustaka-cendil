@extends('layouts.public')

@section('content')

    <!-- HERO -->
    <section class="bg-gradient-to-r from-slate-900 to-slate-700 text-white py-24">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-4">
                Selamat Datang di Pustaka Cendil
            </h2>
            <p class="text-lg text-slate-200 mb-8">
                Pusat literasi dan informasi masyarakat.
            </p>
            <a href="/daftar-anggota"
               class="bg-green-600 px-6 py-3 rounded-lg hover:bg-green-500">
                Daftar Menjadi Anggota
            </a>
        </div>
    </section>

    <!-- SECTION INFO -->
    <section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-bold mb-2">Layanan Buku</h3>
            <p class="text-sm text-slate-600">
                Ribuan koleksi buku tersedia untuk dipinjam.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-bold mb-2">Berita & Kegiatan</h3>
            <p class="text-sm text-slate-600">
                Informasi terbaru kegiatan literasi.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-bold mb-2">Keanggotaan</h3>
            <p class="text-sm text-slate-600">
                Daftar dan nikmati fasilitas perpustakaan.
            </p>
        </div>
    </section>

@endsection