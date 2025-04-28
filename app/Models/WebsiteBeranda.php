<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteBeranda extends Model
{
    protected $table = 'website_beranda';
    
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'hero_button_text',
        'hero_subtext'
    ];
}
