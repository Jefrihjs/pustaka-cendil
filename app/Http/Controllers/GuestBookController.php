<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tujuan' => 'required',
        ]);

        \App\Models\Kunjungan::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tujuan' => $request->tujuan,
            'instansi' => $request->instansi,
            'tanggal' => now()->toDateString(), // Otomatis tanggal hari ini
        ]);

        return back()->with('success', 'Terima kasih telah berkunjung ke Pustaka Cendil!');
    }

    public function index()
        {
            return view('public.buku-tamu'); 
        }

}
