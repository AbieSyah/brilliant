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
            $galeri = WebsiteGaleri::firstOrNew();
            
            $galeri->galeri_title = $request->galeri_title;
            $galeri->galeri_description = $request->galeri_description;

            // Handle multiple image uploads
            if ($request->hasFile('galeri_images')) {
                $images = [];
                foreach ($request->file('galeri_images') as $image) {
                    $path = $image->store('galeri', 'public');
                    $images[] = $path;
                }
                $galeri->images = $images; // Will be automatically JSON encoded
            }

            $galeri->save();

            return redirect()->back()->with('success', 'Galeri updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update galeri: ' . $e->getMessage());
        }
    }
}
