<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    
    public function show(Post $post)
    {
        
        $post->load(['user', 'images']);
        
        return view('berita.show', compact('post'));
    }

    /**
     * Simpan Berita Baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'lokasi' => 'nullable|string',
            // ... validasi lainnya ...
        ]);

        // SIMPAN DATA BERITA
        $post = Post::create([
            'user_id' => auth()->id(), 
            'judul'   => $request->judul,
            'slug'    => Str::slug($request->judul) . '-' . Str::random(5),
            'konten'  => $request->konten,
            'lokasi'  => $request->lokasi ?? 'Manggar',
            'status'  => 'published',
            
        ]);

        return redirect()->back()->with('success', 'Berita berhasil diterbitkan!');
    }

    /**
     * Update Berita
     */
    public function update(Request $request, Post $post)
    {
        
        // if(auth()->id() !== $post->user_id && auth()->user()->role !== 'super_admin') {
        //     abort(403);
        // }

        $post->update([
            'judul'  => $request->judul,
            'konten' => $request->konten,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->back()->with('success', 'Berita diperbarui!');
    }
}