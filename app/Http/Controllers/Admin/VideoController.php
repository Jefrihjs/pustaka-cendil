<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * FUNGSI SIMPAN (Hanya ada SATU di sini)
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'youtube_id' => 'required|string',
            'status' => 'required'
        ]);

        $url = $request->youtube_id;
        $videoId = $url;

        // Logika Pintar: Ambil ID dari Link YouTube yang di-paste
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $videoId = $match[1];
        }

        Video::create([
            'judul' => $request->judul,
            'youtube_id' => $videoId,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil ditambah!');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'youtube_id' => 'required|string',
            'status' => 'required'
        ]);

        $url = $request->youtube_id;
        $videoId = $url;

        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $videoId = $match[1];
        }

        $video->update([
            'judul' => $request->judul,
            'youtube_id' => $videoId,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil diupdate!');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return back()->with('success', 'Video berhasil dihapus.');
    }
}