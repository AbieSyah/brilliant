<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AplikasiBeranda extends Model
{
    protected $table = 'aplikasi_beranda';
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'button_text'
    ];
}
