<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crud;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $datatable = crud::all();
        return view('admin.index', compact('datatable'));
    }
}
