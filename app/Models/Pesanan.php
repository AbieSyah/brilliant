<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengguna',
        'tipe_kamar',
        'status_pesanan',
        'keterangan',
        'tanggal_pesanan',
        'durasi_pesanan'
    ];
}
