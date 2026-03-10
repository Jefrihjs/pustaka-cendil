<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Tampilkan semua Banner yang aktif
     */
    public function index()
    {
        $banners = Gallery::where('is_banner', true)->latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Form Tambah Banner
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Simpan Banner Baru
     */
    public function store(Request $request)
    {
        // 1. Ambil file mentah dari request
        $file = $request->file('foto');
        
        // 2. Tentukan nama & lokasi tujuan (storage/app/public/galleries)
        $fileName = time() . '_' . $file->getClientOriginalName();
        $destinationPath = storage_path('app/public/galleries');

        // 3. PINDAHKAN LANGSUNG (Tanpa lewat tempnam sistem)
        // Cara ini "melompati" folder /tmp Docker yang sedang penuh
        $file->move($destinationPath, $fileName);

        // 4. Simpan ke Database
        \App\Models\Gallery::create([
            'caption' => $request->caption,
            'file_path' => 'galleries/' . $fileName,
            'kategori' => 'Banner',
            'is_banner' => true,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner Berhasil!');
    }

    /**
     * Form Edit Banner
     */
    public function edit($id)
    {
        $banner = Gallery::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update Data Banner
     */
    public function update(Request $request, $id)
    {
        $banner = Gallery::findOrFail($id);

        $request->validate([
            'caption' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::disk('public')->delete($banner->file_path);
            // Upload foto baru
            $path = $request->file('foto')->store('galleries', 'public');
            $banner->file_path = $path;
        }

        $banner->caption = $request->caption;
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil diperbarui!');
    }

    /**
     * Hapus Banner (Copot dari Beranda)
     */
    public function destroy($id)
    {
        $banner = Gallery::findOrFail($id);
        
        // Hapus file fisiknya
        Storage::disk('public')->delete($banner->file_path);
        
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil dicopot!');
    }
}