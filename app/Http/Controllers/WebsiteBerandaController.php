<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBeranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class WebsiteBerandaController extends Controller
{
    public function update(Request $request)
    {
        try {
            Log::info('Starting image upload process');
            
            // Updated validation
            $request->validate([
                'teks_utama' => 'nullable|string|max:255',
                'konten_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
            ]);

            $beranda = WebsiteBeranda::first() ?? new WebsiteBeranda();

            // Update text field
            $beranda->teks_utama = $request->teks_utama;

            // Handle image upload
            if ($request->hasFile('konten_gambar')) {
                $file = $request->file('konten_gambar');
                
                // Log file information
                Log::info('File details:', [
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize()
                ]);

                // Delete old image
                if ($beranda->konten_gambar && Storage::disk('public')->exists($beranda->konten_gambar)) {
                    Storage::disk('public')->delete($beranda->konten_gambar);
                }

                // Generate unique filename
                $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                
                // Store the file
                $path = $file->storeAs('beranda', $filename, 'public');
                
                if (!$path) {
                    throw new \Exception('Failed to store the file');
                }

                $beranda->konten_gambar = $path;
                Log::info('Image stored successfully at: ' . $path);
            }

            // Save the model
            if (!$beranda->save()) {
                throw new \Exception('Failed to save to database');
            }

            Log::info('Beranda updated successfully', ['id' => $beranda->id]);

            return response()->json([
                'message' => 'Data berhasil diperbarui',
                'success' => true
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', ['errors' => $e->errors()]);
            return response()->json([
                'message' => 'Validasi gagal: ' . $e->errors()->first(),
                'success' => false
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error in update:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'message' => 'Error: ' . $e->getMessage(),
                'success' => false
            ], 500);
        }
    }
}
