<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AplikasiBeranda;
use App\Models\AplikasiKamar;
use App\Models\AplikasiFasilitas;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{
    public function getBeranda()
    {
        try {
            $beranda = AplikasiBeranda::first();
            return response()->json([
                'success' => true,
                'data' => $beranda,
                'message' => 'Data beranda berhasil diambil'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getEvent()
    {
        try {
            $event = AplikasiEvent::all();
            return response()->json([
                'success' => true,
                'data' => $event,
                'message' => 'Data kamar berhasil diambil'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getFasilitas()
    {
        try {
            $fasilitas = AplikasiFasilitas::all();
            return response()->json([
                'success' => true,
                'data' => $fasilitas,
                'message' => 'Data fasilitas berhasil diambil'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
