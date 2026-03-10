<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * 1. Tampilkan Daftar Foto
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * 2. Tampilkan Form Tambah Foto
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * 3. Simpan Foto Baru
     */
    public function store(Request $request) 
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'kategori' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // PROTEKSI: Jika bukan super_admin, paksa is_banner jadi 0 (false)
        $isBanner = (auth()->user()->role === 'super_admin') ? $request->has('is_banner') : false;

        $path = $request->file('foto')->store('galleries', 'public');

        Gallery::create([
            'caption' => $request->caption,
            'kategori' => $request->kategori,
            'file_path' => $path,
            'is_banner' => $isBanner,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto berhasil ditambah!');
    }

    /**
     * FIX: Fungsi show()
     */
    public function show($id)
    {
        return redirect()->route('admin.galleries.index');
    }

    /**
     * 4. Tampilkan Form Edit Foto
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * 5. Simpan Perubahan Data
     */
    public function update(Request $request, Gallery $gallery) 
    {
        $request->validate([
            'caption' => 'required', 
            'kategori' => 'required', 
            'foto' => 'nullable|image|max:2048'
        ]);

        // PROTEKSI: Jika bukan super_admin, paksa tetap pada nilai lama atau set 0
        // Ini biar user biasa nggak bisa "menembak" data lewat postman/inspect
        $isBanner = (auth()->user()->role === 'super_admin') ? $request->has('is_banner') : $gallery->is_banner;

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($gallery->file_path);
            $gallery->file_path = $request->file('foto')->store('galleries', 'public');
        }

        $gallery->update([
            'caption' => $request->caption,
            'kategori' => $request->kategori,
            'is_banner' => $isBanner,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Data diperbarui!');
    }

    /**
     * 6. Hapus Foto
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();
        return back()->with('success', 'Foto berhasil dihapus.');
    }
}