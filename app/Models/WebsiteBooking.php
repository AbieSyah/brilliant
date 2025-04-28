<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteBooking extends Model
{
    protected $table = 'website_booking';
    
    protected $fillable = [
        'booking_title',
        'booking_description',
        'booking_image'
    ];
}
