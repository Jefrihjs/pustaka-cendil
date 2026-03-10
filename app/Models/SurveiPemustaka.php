<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveiPemustaka extends Model
{
    protected $fillable = [
        'nama', 'kategori', 'pendidikan', 'pekerjaan', 'usia', 'subjek_disarankan', 'saran'
    ];
}