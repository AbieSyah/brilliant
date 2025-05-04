<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteBeranda extends Model
{
    protected $table = 'website_beranda';
    
    protected $fillable = [
        'teks_utama',
        'konten_gambar'
    ];
}
