<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveiPemustaka;
use Illuminate\Http\Request;

class SurveiController extends Controller
{
    /**
     * 1. HALAMAN DAFTAR (ADMIN)
     */
    public function index()
    {
        $surveis = SurveiPemustaka::latest()->get();
        return view('admin.survei.index', compact('surveis'));
    }

    /**
     * 2. HALAMAN FORM (PUBLIK)
     */
    public function create()
    {
        return view('public.survei_kebutuhan');
    }

    /**
     * 3. FUNGSI SIMPAN (LOGIKA UTAMA)
     * Sudah disamakan dengan isi Model: kategori, usia, subjek_disarankan
     */
    public function store(Request $request)
    {
        // 1. Validasi Input (Harus sama dengan name di HTML)
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'usia' => 'required|numeric',
            'subjek_disarankan' => 'required|string',
            'saran' => 'nullable|string',
        ]);

        // 2. Proses simpan ke Database (Nama kolom disesuaikan Model)
        SurveiPemustaka::create([
            'nama'              => $request->nama,
            'kategori'          => $request->kategori,
            'pendidikan'        => $request->pendidikan,
            'pekerjaan'         => $request->pekerjaan,
            'usia'              => $request->usia,
            'subjek_disarankan' => $request->subjek_disarankan, // Ini pengganti 'kebutuhan_informasi'
            'saran'             => $request->saran,
        ]);

        // 3. Balik ke Home dengan pesan sukses
        return redirect()->route('home')->with('success', 'Terima kasih! Survei kebutuhan Anda telah kami terima.');
    }

    /**
     * 4. FUNGSI HAPUS (ADMIN)
     */
    public function destroy($id)
    {
        $survei = SurveiPemustaka::findOrFail($id);
        $survei->delete();

        return back()->with('success', 'Data survei berhasil dihapus dari sistem!');
    }
}