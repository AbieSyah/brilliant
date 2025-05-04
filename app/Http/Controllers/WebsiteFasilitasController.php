<?php

namespace App\Http\Controllers;

use App\Models\WebsiteFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class WebsiteFasilitasController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_fasilitas' => 'required|string|max:255',
                'deskripsi_detail' => 'required|string',
                'gambar_singkat' => 'nullable|image|max:20480',
                'gambar_detail' => 'nullable|image|max:20480'
            ]);

            $data = $request->except(['gambar_singkat', 'gambar_detail']);

            if ($request->hasFile('gambar_singkat')) {
                $data['gambar_singkat'] = $request->file('gambar_singkat')->store('fasilitas', 'public');
            }

            if ($request->hasFile('gambar_detail')) {
                $data['gambar_detail'] = $request->file('gambar_detail')->store('fasilitas', 'public');
            }

            WebsiteFasilitas::create($data);

            return response()->json([
                'message' => 'Fasilitas berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan fasilitas: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $fasilitas = WebsiteFasilitas::findOrFail($id);
            return response()->json($fasilitas);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Fasilitas tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        try {
            $fasilitas = WebsiteFasilitas::findOrFail($request->fasilitas_id);
            
            $validated = $request->validate([
                'nama_fasilitas' => 'required|string|max:255',
                'deskripsi_detail' => 'required|string',
                'gambar_singkat' => 'nullable|image|max:20480',
                'gambar_detail' => 'nullable|image|max:20480'
            ]);

            $data = $request->except(['gambar_singkat', 'gambar_detail']);

            if ($request->hasFile('gambar_singkat')) {
                if ($fasilitas->gambar_singkat) {
                    Storage::disk('public')->delete($fasilitas->gambar_singkat);
                }
                $data['gambar_singkat'] = $request->file('gambar_singkat')->store('fasilitas', 'public');
            }

            if ($request->hasFile('gambar_detail')) {
                if ($fasilitas->gambar_detail) {
                    Storage::disk('public')->delete($fasilitas->gambar_detail);
                }
                $data['gambar_detail'] = $request->file('gambar_detail')->store('fasilitas', 'public');
            }

            $fasilitas->update($data);

            return response()->json([
                'message' => 'Fasilitas berhasil diperbarui'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui fasilitas: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $fasilitas = WebsiteFasilitas::findOrFail($id);
            
            if ($fasilitas->gambar_singkat) {
                Storage::disk('public')->delete($fasilitas->gambar_singkat);
            }
            if ($fasilitas->gambar_detail) {
                Storage::disk('public')->delete($fasilitas->gambar_detail);
            }
            
            $fasilitas->delete();
            
            return response()->json([
                'message' => 'Fasilitas berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus fasilitas: ' . $e->getMessage()
            ], 500);
        }
    }
}
