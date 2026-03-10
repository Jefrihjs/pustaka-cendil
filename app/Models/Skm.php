<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skm extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'jenis_kelamin', 'umur', 'pendidikan', 'pekerjaan',
        'u1', 'u2', 'u3', 'u4', 'u5', 'u6', 'u7', 'u8', 'u9', 'saran'
    ];
}