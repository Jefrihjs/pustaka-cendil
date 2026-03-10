<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MemberController extends Controller
{
    public function dashboard()
    {
        // Hitung data untuk statistik
        $totalMembers = Member::count();
        $activeMembers = Member::where('status', 'aktif')->count();
        $inactiveMembers = Member::where('status', 'nonaktif')->count();

        return view('admin.dashboard', compact(
            'totalMembers', 
            'activeMembers', 
            'inactiveMembers'
        ));
    }
    
    public function index()
    {
        $members = Member::latest()->get();
        return view('admin.members.index', compact('members'));
    }

    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        // Menampilkan halaman edit dengan data anggota tertentu
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_pekerjaan' => 'required',
            'no_hp' => 'nullable|string',
            'instansi' => 'nullable|string',
            'alamat_rumah' => 'nullable|string',
        ]);

        // Update data ke database
        $member->update($request->all());

        // Kembali ke index dengan pesan sukses
        return redirect()->route('admin.members.index')
            ->with('success', 'Data ' . $member->nama . ' berhasil diperbarui!');
    }

    public function activate(Member $member)
    {
        $member->update([
            'status' => 'aktif'
        ]);

        return back()->with('success', 'Anggota berhasil diaktifkan');
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        // Sebaiknya tambahkan validasi di sini jika diperlukan
        Member::create($request->all());

        return redirect()->route('admin.members.index')
            ->with('success', 'Anggota berhasil ditambahkan');
    }

    public function destroy(Member $member)
    {
        // Menghapus data dari database
        $member->delete();

        // Kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('admin.members.index')
            ->with('success', 'Data anggota berhasil dihapus');
    }

    /**
     * Cetak Kartu Anggota (PDF)
     */
    public function print(Member $member)
    {
        $pdf = Pdf::loadView('admin.members.print', compact('member'))
                ->setPaper('a4', 'portrait'); 

        return $pdf->stream('Kartu-' . $member->nama . '.pdf');
    }

    /**
     * Cetak Formulir Pendaftaran (PDF)
     */
    public function printForm(Member $member)
    {
        // Menggunakan DomPDF untuk render formulir pendaftaran fisik
        $pdf = Pdf::loadView('admin.members.print_form', compact('member'))
                  ->setPaper('a4', 'portrait'); // Standar kertas A4 untuk formulir

        return $pdf->stream('Formulir-' . $member->nama . '.pdf');
    }
}