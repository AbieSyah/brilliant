<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKamarforAPI extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'nama_kamar',
        'deskripsi',
        'gender',
        'gambar',
        'harga'
    ];

    protected $casts = [
        'harga' => 'decimal:2'
    ];
}
