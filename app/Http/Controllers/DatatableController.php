<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function index()
    {
        $datatable = crud::all();
        return view('datatable.index', compact('datatable'));
    }
}