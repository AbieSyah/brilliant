<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteGaleri extends Model
{
    protected $table = 'website_galeri';
    
    protected $fillable = [
        'galeri_title',
        'galeri_description',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];
}
