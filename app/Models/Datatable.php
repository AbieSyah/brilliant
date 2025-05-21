<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datatable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'age',
        'office',
        'jenis_kelamin',
        'start_date'
    ];
}