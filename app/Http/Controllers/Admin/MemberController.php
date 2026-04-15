<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon; // Carbon sudah benar di sini

class MemberController extends Controller
{
    public function dashboard()
    {
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
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_pekerjaan' => 'required',
            'no_hp' => 'nullable|string',
            'instansi' => 'nullable|string',
            'alamat_rumah' => 'nullable|string',
        ]);

        $member->update($request->all());

        return redirect()->route('admin.members.index')
            ->with('success', 'Data ' . $member->nama . ' berhasil diperbarui!');
    }

    public function activate(Member $member)
    {
        $member->update(['status' => 'aktif']);
        return back()->with('success', 'Anggota berhasil diaktifkan');
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // 1. LOGIKA KODE OTOMATIS (Sudah aman)
        $tahun = date('Y');
        $lastMember = Member::where('kode_anggota', 'like', 'AGT-' . $tahun . '-%')->latest()->first();
        $noUrut = $lastMember ? (int) substr($lastMember->kode_anggota, -4) + 1 : 1;
        $data['kode_anggota'] = 'AGT-' . $tahun . '-' . str_pad($noUrut, 4, '0', STR_PAD_LEFT);

        // 2. KONVERSI TANGGAL LAHIR (Sudah aman)
        if ($request->filled('tanggal_lahir')) {
            try {
                $data['tanggal_lahir'] = \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d');
            } catch (\Exception $e) {
                $data['tanggal_lahir'] = \Carbon\Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
            }
        }

        // 3. ISI TANGGAL DAFTAR (Penyakit yang sekarang)
        // Kita set tanggal hari ini sebagai tanggal daftar
        $data['tanggal_daftar'] = now(); 

        // 4. Set status default
        $data['status'] = $data['status'] ?? 'pending';

        // 5. SIMPAN
        Member::create($data);

        return redirect()->route('admin.members.index')
            ->with('success', 'Anggota ' . $data['nama'] . ' berhasil terdaftar dengan kode ' . $data['kode_anggota']);
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index')
            ->with('success', 'Data anggota berhasil dihapus');
    }

    public function print(Member $member)
    {
        $pdf = Pdf::loadView('admin.members.print', compact('member'))
                ->setPaper('a4', 'portrait'); 

        return $pdf->stream('Kartu-' . $member->nama . '.pdf');
    }

    public function printForm(Member $member)
    {
        $pdf = Pdf::loadView('admin.members.print_form', compact('member'))
                  ->setPaper('a4', 'portrait'); 

        return $pdf->stream('Formulir-' . $member->nama . '.pdf');
    }
}