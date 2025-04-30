<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AplikasiFasilitas extends Model
{
    protected $table = 'aplikasi_fasilitas';
    
    protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'icon',
        'gambar',
        'status'
    ];
}
