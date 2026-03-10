<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function index()
    {
        $kunjungans = Kunjungan::latest()->paginate(10);
        return view('admin.kunjungan.index', compact('kunjungans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tujuan' => 'required',
            'tanggal' => 'required|date',
        ]);

        Kunjungan::create($request->all());

        return back()->with('success', 'Data kunjungan berhasil dicatat!');
    }
}