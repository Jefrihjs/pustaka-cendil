<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['caption', 'file_path', 'kategori', 'is_banner'];
}
