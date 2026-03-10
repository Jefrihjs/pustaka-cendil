<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image; // Import library kompres

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->with('images')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:5120' 
        ]);

        // Gunakan status dari input, default 'publish' jika tidak ada
        $status = $request->status ?? 'publish';
        
        $post = Post::create([
            'judul'      => $request->judul,
            'slug'       => Str::slug($request->judul) . '-' . time(),
            'konten'     => $request->konten,
            'status'     => $status, // Gunakan variabel $status
            'lokasi'     => $request->lokasi,
            'kategori'   => $request->kategori,
            'created_at' => $request->created_at ?? now(),
        ]);

        if ($request->hasFile('images')) {
            $this->uploadImages($request->file('images'), $post);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil disimpan sebagai ' . $status . '!');
    }

    public function edit(Post $post)
    {
        
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $post->update([
            'judul'      => $request->judul,
            'slug'       => Str::slug($request->judul),
            'konten'     => $request->konten,
            'status'     => $request->status ?? $post->status, // TAMBAHKAN INI agar status bisa berubah
            'lokasi'     => $request->lokasi,
            'kategori'   => $request->kategori,
            'created_at' => $request->created_at,
        ]);

        if ($request->hasFile('images')) {
            $this->uploadImages($request->file('images'), $post);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('images')->firstOrFail();
        return view('public.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        foreach($post->images as $image) {
            Storage::disk('public')->delete($image->path);
        }
        $post->delete();
        return back()->with('success', 'Berita berhasil dihapus');
    }

    /**
     * Fungsi Tambahan (Helper) untuk Kompres & Simpan Gambar
     */
    private function uploadImages($files, $post)
    {
        foreach ($files as $index => $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = 'berita-' . $post->slug . '-' . ($index + 1) . '-' . time() . '.' . $extension;
            $path = 'posts/' . $filename;

            // Proses Kompres (1200px, Kualitas 70%)
            $img = Image::make($file->getRealPath());
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            Storage::disk('public')->put($path, (string) $img->encode($extension, 70));

            // Simpan path ke Database
            $post->images()->create(['path' => $path]);
        }
    }

    public function destroyImage($id)
    {
        // 1. Cari data foto berdasarkan ID-nya
        $image = PostImage::findOrFail($id);
        
        // 2. Simpan Post ID-nya dulu sebelum datanya dihapus (untuk redirect kembali)
        $postId = $image->post_id;

        // 3. Hapus File Fisik dari Storage ('storage/posts/berita-...')
        if (Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path);
        }

        // 4. Hapus Data dari Database (Tabel 'post_images')
        $image->delete();

        // 5. Kembali ke Halaman Edit dengan Notifikasi Sukses
        return redirect()->route('admin.posts.edit', $postId)
                        ->with('success', 'Satu foto berita berhasil dihapus!');
    }
}