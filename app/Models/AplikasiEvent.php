<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AplikasiEvent extends Model
{
    protected $table = 'aplikasi_event';
    
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'gambar',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'status'
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];
}
