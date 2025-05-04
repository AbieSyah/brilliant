<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteReview extends Model
{
    protected $table = 'reviews';
    
    protected $fillable = [
        'nama',
        'gambar_profil',
        'detail_review',
        'rating'
    ];
}
