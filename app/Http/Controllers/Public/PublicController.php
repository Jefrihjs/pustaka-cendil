<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Halaman Utama (Home)
     */
    public function index()
    {
        // 1. Ambil foto yang ditandai sebagai BANNER (untuk Slide Hero)
        $banners = \App\Models\Gallery::where('is_banner', true)->latest()->get();

        // 2. Ambil berita terbaru yang SUDAH DITERBITKAN
        $posts = Post::where('status', 'publish')
                    ->latest()
                    ->take(6)
                    ->get();
        
        // 3. Ambil foto galeri terbaru (bukan banner) untuk section galeri bawah
        $galleries = Gallery::where('is_banner', false)
                    ->latest()
                    ->take(6)
                    ->get();

        // 4. Ambil video terbaru
        $videos = Video::where('status', 'publish')
                    ->orWhereNull('status')
                    ->latest()
                    ->take(3)
                    ->get();

        // Kirim $banners ke view
        return view('public.home', compact('banners', 'posts', 'galleries', 'videos'));
    }

    /**
     * Detail Berita
     */
    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('status', 'publish')
                    ->with('images')
                    ->firstOrFail();
                    
        return view('public.posts.show', compact('post'));
    }

    /**
     * Daftar Semua Berita
     */
    public function allPosts()
    {
        $posts = Post::with('images')
                ->where('status','publish')
                ->latest()
                ->paginate(9); 

        return view('public.posts.index', compact('posts'));
    }

    /**
     * Halaman Galeri (Foto & Video)
     */
    public function gallery(Request $request)
    {
        $photos = Gallery::latest()->paginate(12, ['*'], 'photos_page');
        
        $videos = Video::latest()->paginate(9, ['*'], 'videos_page');

        // Bersihkan ID YouTube agar thumbnail muncul
        $videos->getCollection()->transform(function ($video) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->youtube_id, $match)) {
                $video->youtube_id = $match[1];
            }
            return $video;
        });

        return view('public.gallery.index', compact('photos', 'videos'));
    }
    
}