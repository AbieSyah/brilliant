<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteGaleri extends Model
{
    protected $table = 'website_galeri';
    
    protected $fillable = [
        'konten_gambar',
        'konten_video',
        'video_url',
        'video_type'
    ];
}
