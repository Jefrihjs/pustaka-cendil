<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // Tambahkan baris ini, Bang!
    protected $fillable = [
        'judul',
        'youtube_id', // Sesuaikan dengan nama kolom di database Abang
        'kategori',
        'status',
    ];
}