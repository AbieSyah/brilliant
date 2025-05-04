<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AplikasiFasilitas extends Model
{
    protected $table = 'kamar';
    
    protected $fillable = [
        'nama_kamar',
        'deskripsi',
        'gender',
        'type_kamar',
        'kategori',
        'harga',
        'gambar'
    ];
}
