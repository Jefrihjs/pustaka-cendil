<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

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
        | 1️⃣ VALIDASI DASAR
        |--------------------------------------------------------------------------
        */

        $rules = [
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kategori_pekerjaan' => 'required|in:umum,asn,mahasiswa,siswa',
            'alamat_rumah' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'no_hp' => 'required|regex:/^08[0-9]{8,12}$/'
        ];

        /*
        |--------------------------------------------------------------------------
        | 2️⃣ VALIDASI BERDASARKAN KATEGORI
        |--------------------------------------------------------------------------
        */

        if ($request->kategori_pekerjaan == 'umum') {
            $rules['sektor'] = 'required';
            $rules['instansi'] = 'required';
            $rules['alamat_instansi'] = 'required';
        }

        if ($request->kategori_pekerjaan == 'asn') {
            $rules['instansi'] = 'required';
            $rules['alamat_instansi'] = 'required';
        }

        if ($request->kategori_pekerjaan == 'mahasiswa') {
            $rules['instansi'] = 'required';
            $rules['fakultas'] = 'required';
            $rules['alamat_instansi'] = 'required';
        }

        if ($request->kategori_pekerjaan == 'siswa') {
            $rules['instansi'] = 'required';
            $rules['kelas'] = 'required';
            $rules['alamat_instansi'] = 'required';
        }

        $validated = $request->validate($rules);

        /*
        |--------------------------------------------------------------------------
        | 3️⃣ GENERATE KODE ANGGOTA
        |--------------------------------------------------------------------------
        */

        $lastMember = Member::latest()->first();

        if ($lastMember) {
            $lastNumber = intval(substr($lastMember->kode_anggota, -4));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kodeAnggota = 'AGT-' . date('Y') . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        /*
        |--------------------------------------------------------------------------
        | 4️⃣ SIMPAN DATA
        |--------------------------------------------------------------------------
        */

        Member::create([
            'kode_anggota' => $kodeAnggota,
            'nama' => $validated['nama'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
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
            'tanggal_daftar' => now(),
            'status' => 'pending',
        ]);

        /*
        |--------------------------------------------------------------------------
        | 5️⃣ RESPONSE
        |--------------------------------------------------------------------------
        */

        return redirect()->route('public.members.success');
    }
}