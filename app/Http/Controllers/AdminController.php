<?php

namespace App\Http\Controllers;

use App\Models\Datatable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $datatable = Datatable::all();
        return view('admin.index', compact('datatable'));
    }
}