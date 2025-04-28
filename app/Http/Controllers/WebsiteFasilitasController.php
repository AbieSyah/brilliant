<?php

namespace App\Http\Controllers;

use App\Models\WebsiteFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebsiteFasilitasController extends Controller
{
    public function update(Request $request)
    {
        try {
            $request->validate([
                'fasilitas_title' => 'nullable|string|max:255',
                'fasilitas_description' => 'nullable|string',
                'fasilitas_icon' => 'nullable|string|max:50'
            ]);

            $fasilitas = WebsiteFasilitas::first() ?? new WebsiteFasilitas();
            
            $fasilitas->fasilitas_title = $request->fasilitas_title;
            $fasilitas->fasilitas_description = $request->fasilitas_description;
            $fasilitas->fasilitas_icon = $request->fasilitas_icon;

            $fasilitas->save();

            return redirect()->route('admin.konten.website')
                ->with('success', 'Fasilitas berhasil diperbarui');

        } catch (\Exception $e) {
            Log::error('Fasilitas update error:', ['error' => $e->getMessage()]);
            return redirect()->route('admin.konten.website')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
