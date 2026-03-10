<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Tambahkan 'user_id' di sini biar bisa disimpan
    protected $fillable = ['user_id', 'judul', 'slug', 'konten', 'gambar', 'status', 'kategori', 'lokasi', 'created_at'];

    /**
     * RELASI BARU: Berita ini Milik Siapa? (User/Admin)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi One-to-Many: Satu Berita memiliki Banyak Foto
     */
    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}