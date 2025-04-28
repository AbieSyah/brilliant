<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteFasilitas extends Model
{
    protected $table = 'website_fasilitas';
    
    protected $fillable = [
        'fasilitas_title',
        'fasilitas_description',
        'fasilitas_icon'
    ];
}
