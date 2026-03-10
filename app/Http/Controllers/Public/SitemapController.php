<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post; // Model Berita Abang
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->get();

        return response()->view('public.sitemap', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }
}