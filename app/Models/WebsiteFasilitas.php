<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteFasilitas extends Model
{
    protected $table = 'website_fasilitas';
    
    protected $fillable = [
        'nama_fasilitas',
        'deskripsi_detail',
        'gambar_singkat',
        'gambar_detail'
    ];
}
