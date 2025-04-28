<?php

namespace App\Http\Controllers;

use App\Models\WebsiteGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class WebsiteGaleriController extends Controller
{
    public function update(Request $request)
    {
        try {
            $request->validate([
                'galeri_title' => 'nullable|string|max:255',
                'galeri_description' => 'nullable|string',
                'galeri_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
            ]);

            $galeri = WebsiteGaleri::first() ?? new WebsiteGaleri();
            
            $galeri->galeri_title = $request->galeri_title;
            $galeri->galeri_description = $request->galeri_description;

            // Handle multiple image uploads
            if ($request->hasFile('galeri_images')) {
                $paths = [];
                foreach ($request->file('galeri_images') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $path = $image->storeAs('galeri', $filename, 'public');
                    $paths[] = $path;
                }
                $galeri->images = $paths;
            }

            $galeri->save();

            return redirect()->route('admin.konten.website')
                ->with('success', 'Galeri berhasil diperbarui');

        } catch (\Exception $e) {
            Log::error('Galeri update error:', ['error' => $e->getMessage()]);
            return redirect()->route('admin.konten.website')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
