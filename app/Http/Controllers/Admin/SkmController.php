<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skm;
use Illuminate\Http\Request;

class SkmController extends Controller
{
    // 1. Tampilan Form untuk Warga (Arahkan ke file yang kita edit tadi)
    public function index()
    {
        // Pastikan nama filenya pas: resources/views/public/skm/create.blade.php
        return view('public.skm.create'); 
    }

    // 2. Simpan Data (Profil + 9 Unsur)
    public function store(Request $request)
    {
        // Validasi SEMUA data termasuk Profil
        $validated = $request->validate([
            // Profil Responden
            'email'         => 'required|email',
            'jenis_kelamin' => 'required|string',
            'umur'          => 'required|string',
            'pendidikan'    => 'required|string',
            'pekerjaan'     => 'required|string',
            
            // 9 Unsur SKM (Skor 1-4)
            'u1' => 'required|integer|between:1,4',
            'u2' => 'required|integer|between:1,4',
            'u3' => 'required|integer|between:1,4',
            'u4' => 'required|integer|between:1,4',
            'u5' => 'required|integer|between:1,4',
            'u6' => 'required|integer|between:1,4',
            'u7' => 'required|integer|between:1,4',
            'u8' => 'required|integer|between:1,4',
            'u9' => 'required|integer|between:1,4',
            
            'saran' => 'nullable|string',
        ]);

        // Simpan ke Database
        Skm::create($validated);

        // Kasih notifikasi sukses
        return redirect()->route('home')->with('success', 'Terima kasih! Penilaian Anda sangat berharga bagi Pustaka Cendil.');
    }

    // 3. Tampilan Hasil Survei untuk Publik (Halaman Grafik)
    public function publicResult()
    {
        $totalResponden = \App\Models\Skm::count();
        
        if ($totalResponden > 0) {
            // 1. Ambil rata-rata dari semua unsur (u1 - u9)
            $avgUnsur = \App\Models\Skm::selectRaw('
                (AVG(u1) + AVG(u2) + AVG(u3) + AVG(u4) + AVG(u5) + 
                AVG(u6) + AVG(u7) + AVG(u8) + AVG(u9)) / 9 as total_avg
            ')->first()->total_avg;

            // 2. Hitung Nilai IKM (Skala 100)
            $ikm = $avgUnsur * 25;
        } else {
            $ikm = 0;
        }

        // 3. Tentukan Mutu & Kinerja (Standar Gambar 7)
        if($ikm >= 88.31) { $mutu = 'A'; $kinerja = 'Sangat Baik'; $warna = 'text-emerald-500'; }
        elseif($ikm >= 76.61) { $mutu = 'B'; $kinerja = 'Baik'; $warna = 'text-blue-500'; }
        elseif($ikm >= 65.01) { $mutu = 'C'; $kinerja = 'Kurang Baik'; $warna = 'text-amber-500'; }
        else { $mutu = 'D'; $kinerja = 'Tidak Baik'; $warna = 'text-red-500'; }

        // 4. Statistik Responden (Gambar 8 & 9)
        $respondenPria = \App\Models\Skm::where('jenis_kelamin', 'Laki-laki')->count(); // Sesuaikan tulisan di DB
        $respondenWanita = \App\Models\Skm::where('jenis_kelamin', 'Perempuan')->count();
        
        // Data Grafik Berdasarkan Rata-rata per Unsur
        $avgPerUnsur = \App\Models\Skm::selectRaw('AVG(u1) as u1, AVG(u2) as u2, AVG(u3) as u3, AVG(u4) as u4, AVG(u5) as u5, AVG(u6) as u6, AVG(u7) as u7, AVG(u8) as u8, AVG(u9) as u9')->first();
        $grafikData = [
            number_format($avgPerUnsur->u1, 2), number_format($avgPerUnsur->u2, 2), 
            number_format($avgPerUnsur->u3, 2), number_format($avgPerUnsur->u4, 2),
            number_format($avgPerUnsur->u5, 2), number_format($avgPerUnsur->u6, 2),
            number_format($avgPerUnsur->u7, 2), number_format($avgPerUnsur->u8, 2),
            number_format($avgPerUnsur->u9, 2)
        ];

        return view('public.skm.hasil', compact('ikm', 'mutu', 'kinerja', 'warna', 'totalResponden', 'grafikData', 'respondenPria', 'respondenWanita'));
    }

    public function cetakPdf()
    {
        $totalResponden = \App\Models\Skm::count();
        $avgUnsur = \App\Models\Skm::selectRaw('
            (AVG(u1) + AVG(u2) + AVG(u3) + AVG(u4) + AVG(u5) + 
            AVG(u6) + AVG(u7) + AVG(u8) + AVG(u9)) / 9 as total_avg
        ')->first()->total_avg;

        $ikm = ($avgUnsur ?? 0) * 25;

        if($ikm >= 88.31) { $mutu = 'A'; $kinerja = 'Sangat Baik'; }
        elseif($ikm >= 76.61) { $mutu = 'B'; $kinerja = 'Baik'; }
        elseif($ikm >= 65.01) { $mutu = 'C'; $kinerja = 'Kurang Baik'; }
        else { $mutu = 'D'; $kinerja = 'Tidak Baik'; }

        $data = [
            'ikm' => number_format($ikm, 2),
            'mutu' => $mutu,
            'kinerja' => $kinerja,
            'totalResponden' => $totalResponden,
            'tanggal' => now()->locale('id')->isoFormat('DD MMMM YYYY')
        ];

        $pdf = \PDF::loadView('admin.skm.cetak_pdf', $data);
        return $pdf->setPaper('a4', 'portrait')->download('Laporan_SKM_Pustaka_Cendil.pdf');
    }
    
    // 4. Tampilan Tabel untuk Admin
    public function adminIndex()
    {
        $skms = Skm::latest()->get(); 
        return view('admin.skm.index', compact('skms'));
    }

    // 5. Hapus Data (Admin Only)
    public function destroy($id)
    {
        $skm = Skm::findOrFail($id);
        $skm->delete();
        return redirect()->back()->with('success', 'Data SKM berhasil dihapus.');
    }
}