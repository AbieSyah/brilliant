<?php

namespace Database\Seeders;

use App\Models\crud;
use Illuminate\Database\Seeder;

class DatatableSeeder extends Seeder
{
    public function run()
    {
        crud::create([
            'name' => 'John Doe',
            'position' => 'Manager',
            'age' => '30',
            'office' => 'New York',
            'start_date' => '2024-01-01'
        ]);
    }
}