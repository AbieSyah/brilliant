<?php

namespace App\Http\Controllers;

use App\Models\Datatable;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function index()
    {
        $datatable = Datatable::all();
        return view('datatable.index', compact('datatable'));
    }
}