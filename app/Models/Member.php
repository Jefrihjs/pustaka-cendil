<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'kode_anggota',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kategori_pekerjaan',
        'sektor',
        'instansi',
        'fakultas',
        'kelas',
        'alamat_instansi',
        'alamat_rumah',
        'rt',
        'rw',
        'desa',
        'no_hp',
        'tanggal_daftar',
        'status'
    ];
}