<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SurveiPemustaka; // Sesuaikan dengan nama Model Abang
use Illuminate\Http\Request;

class PublicSurveiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang masuk dari form warga
        $request->validate([
            'kategori' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'usia' => 'required|numeric',
            'subjek_disarankan' => 'required',
            'saran' => 'required',
        ]);

        // Simpan ke database
        SurveiPemustaka::create($request->all());

        // Lempar balik ke halaman SKM dengan pesan sukses
        return redirect()->route('home')->with('success_survei', 'Terima kasih! Aspirasi Anda sangat berarti untuk Pustaka Cendil.');
    }
}