<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        return view('admin.pesanan.permintaan_pesanan.main', compact('pesanans'));
    }

    public function history()
    {
        $pesanans = Pesanan::all(); // You might want to filter this for completed/past orders only
        return view('admin.pesanan.riwayat_pesanan.history', compact('pesanans'));
    }
}