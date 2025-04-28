<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteFooter extends Model
{
    protected $table = 'website_footer';
    
    protected $fillable = [
        'footer_address',
        'footer_email',
        'footer_phone',
        'footer_facebook',
        'footer_instagram'
    ];
}
