<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ route('kunjungan.digital') }}</loc>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('public.posts.index') }}</loc>
        <priority>0.9</priority>
    </url>

    @foreach ($posts as $post)
    <url>
        <loc>{{ route('public.posts.show', $post->slug) }}</loc>
        <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>