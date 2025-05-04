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

    public function storeImage(Request $request)
    {
        try {
            $request->validate([
                'konten_gambar' => 'required|image|max:20480'
            ]);

            $path = $request->file('konten_gambar')->store('galeri/images', 'public');
            
            WebsiteGaleri::create([
                'konten_gambar' => $path
            ]);

            return response()->json([
                'message' => 'Gambar berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan gambar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeVideo(Request $request)
    {
        try {
            $request->validate([
                'konten_video' => 'required|mimetypes:video/mp4,video/mpeg,video/quicktime|max:102400'
            ]);

            $path = $request->file('konten_video')->store('galeri/videos', 'public');
            
            WebsiteGaleri::create([
                'konten_video' => $path
            ]);

            return response()->json([
                'message' => 'Video berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan video: ' . $e->getMessage()
            ], 500);
        }
    }

    public function storeVideoUrl(Request $request)
    {
        try {
            $request->validate([
                'video_url' => 'required|url',
                'video_type' => 'required|in:youtube,other'
            ]);

            WebsiteGaleri::create([
                'video_url' => $request->video_url,
                'video_type' => $request->video_type
            ]);

            return response()->json([
                'message' => 'Video URL berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan video URL: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $galeri = WebsiteGaleri::findOrFail($id);
            
            if ($galeri->konten_gambar) {
                Storage::disk('public')->delete($galeri->konten_gambar);
            }
            if ($galeri->konten_video) {
                Storage::disk('public')->delete($galeri->konten_video);
            }
            
            $galeri->delete();
            
            return response()->json([
                'message' => 'Konten berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus konten: ' . $e->getMessage()
            ], 500);
        }
    }
}

if (!function_exists('getYoutubeId')) {
    function getYoutubeId($url) {
        $pattern = 
            '%^# Match any youtube URL
            (?:https?://)?  # Optional scheme
            (?:www\.)?      # Optional www
            (?:             # Group host alternatives
              youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
              (?:          # Group path alternatives
                /embed/     # Either /embed/
              | /v/        # or /v/
              | /watch\?v= # or /watch\?v=
              )            # End path alternatives.
            )              # End host alternatives.
            ([\w-]{10,12}) # Allow 10-12 for 11 char youtube id.
            $%x'
        ;
        $result = preg_match($pattern, $url, $matches);
        if ($result) {
            return $matches[1];
        }
        return false;
    }
}
