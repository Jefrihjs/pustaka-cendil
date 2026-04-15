<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon; // 1. WAJIB TAMBAHKAN INI DI ATAS

class PublicMemberController extends Controller
{
    public function create()
    {
        return view('public.members.create');
    }

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | 1️⃣ VALIDASI DASAR (Ubah 'date' jadi 'string' dulu biar gak mental)
        |--------------------------------------------------------------------------
        */
        $rules = [
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required', // Kita validasi manual di bawah saja
            'jenis_kelamin' => 'required|in:L,P',
            'kategori_pekerjaan' => 'required|in:umum,asn,mahasiswa,siswa',
            'alamat_rumah' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'no_hp' => 'required|regex:/^08[0-9]{8,12}$/'
        ];

        // ... (Bagian validasi kategori pekerjaan tetap sama seperti kode Abang)
        if ($request->kategori_pekerjaan == 'umum') {
            $rules['sektor'] = 'required';
            $rules['instansi'] = 'required';
            $rules['alamat_instansi'] = 'required';
        }
        // ... dst (ASN, Mahasiswa, Siswa) - Biarkan kode Abang yang kategori ini tetap ada

        $validated = $request->validate($rules);

        /*
        |--------------------------------------------------------------------------
        | 2️⃣ KONVERSI TANGGAL (Solusi Error 07-04-1988)
        |--------------------------------------------------------------------------
        */
        try {
            // Kita paksa ubah format d-m-Y jadi Y-m-d
            $tanggalLahir = Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d');
        } catch (\Exception $e) {
            // Jika user pakai format lain (misal dari browser)
            $tanggalLahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        }

        /*
        |--------------------------------------------------------------------------
        | 3️⃣ GENERATE KODE ANGGOTA
        |--------------------------------------------------------------------------
        */
        $tahun = date('Y');
        $lastMember = Member::where('kode_anggota', 'like', 'AGT-' . $tahun . '-%')->latest()->first();
        
        if ($lastMember) {
            $lastNumber = intval(substr($lastMember->kode_anggota, -4));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kodeAnggota = 'AGT-' . $tahun . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        /*
        |--------------------------------------------------------------------------
        | 4️⃣ SIMPAN DATA (Pakai $tanggalLahir yang sudah dikonversi)
        |--------------------------------------------------------------------------
        */
        Member::create([
            'kode_anggota' => $kodeAnggota,
            'nama' => $validated['nama'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $tanggalLahir, // <--- PAKAI YANG SUDAH JADI Y-m-d
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'kategori_pekerjaan' => $validated['kategori_pekerjaan'],
            'sektor' => $request->sektor,
            'instansi' => $request->instansi,
            'fakultas' => $request->fakultas,
            'kelas' => $request->kelas,
            'alamat_instansi' => $request->alamat_instansi,
            'alamat_rumah' => $validated['alamat_rumah'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'desa' => $validated['desa'],
            'no_hp' => $validated['no_hp'],
            'tanggal_daftar' => now(), // Aman karena database minta value
            'status' => 'pending',
        ]);

        return redirect()->route('public.members.success');
    }
}