<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    protected $table = 'datatable';
    
    protected $fillable = [
        'name',
        'age',
        'office',
        'position',
        'start_date'
    ];
}