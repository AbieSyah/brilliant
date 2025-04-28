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
            
            // Basic validation
            $request->validate([
                'hero_title' => 'nullable|string|max:255',
                'hero_subtitle' => 'nullable|string|max:255',
                'hero_button_text' => 'nullable|string|max:255',
                'hero_subtext' => 'nullable|string|max:255',
                'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
            ]);

            $beranda = WebsiteBeranda::first() ?? new WebsiteBeranda();

            // Update text fields
            $beranda->fill($request->only([
                'hero_title',
                'hero_subtitle',
                'hero_button_text',
                'hero_subtext'
            ]));

            // Handle image upload
            if ($request->hasFile('hero_image')) {
                $file = $request->file('hero_image');
                
                // Log file information
                Log::info('File details:', [
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize()
                ]);

                // Delete old image
                if ($beranda->hero_image && Storage::disk('public')->exists($beranda->hero_image)) {
                    Storage::disk('public')->delete($beranda->hero_image);
                }

                // Generate unique filename
                $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                
                // Store the file
                $path = $file->storeAs('beranda', $filename, 'public');
                
                if (!$path) {
                    throw new \Exception('Failed to store the file');
                }

                $beranda->hero_image = $path;
                Log::info('Image stored successfully at: ' . $path);
            }

            // Save the model
            if (!$beranda->save()) {
                throw new \Exception('Failed to save to database');
            }

            Log::info('Beranda updated successfully', ['id' => $beranda->id]);

            return redirect()->route('admin.konten.website')
                ->with('success', 'Data berhasil diperbarui');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', ['errors' => $e->errors()]);
            // Get first error message from each field
            $errorMessages = collect($e->errors())->map(function($errors) {
                return $errors[0];
            })->values()->join(', ');
            
            return redirect()->route('admin.konten.website')
                ->withErrors($e->errors())
                ->with('error', 'Validasi gagal: ' . $errorMessages);
        } catch (\Exception $e) {
            Log::error('Error in update:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('admin.konten.website')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
