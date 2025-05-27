<?php

namespace App\Http\Controllers;

use App\Models\WebsiteReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WebsiteReviewController extends Controller
{
    public function index()
    {
        $reviews = WebsiteReview::all();
        return view('admin.konten.aplikasi.aplikasi', compact('reviews'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'detail_review' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'gambar_profil' => 'nullable|image|max:20480'
            ]);

            $data = $request->except('gambar_profil');
            
            if ($request->hasFile('gambar_profil')) {
                $data['gambar_profil'] = $request->file('gambar_profil')->store('reviews', 'public');
            }

            WebsiteReview::create($data);

            return response()->json([
                'message' => 'Review berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan review: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $review = WebsiteReview::findOrFail($id);
            return response()->json($review);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Review tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $review = WebsiteReview::findOrFail($id);
            
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'detail_review' => 'required|string',
                'rating' => 'required|integer|min:1|max:5',
                'gambar_profil' => 'nullable|image|max:20480'
            ]);

            $data = $request->except('gambar_profil');
            
            if ($request->hasFile('gambar_profil')) {
                if ($review->gambar_profil) {
                    Storage::disk('public')->delete($review->gambar_profil);
                }
                $data['gambar_profil'] = $request->file('gambar_profil')->store('reviews', 'public');
            }

            $review->update($data);

            return response()->json([
                'message' => 'Review berhasil diperbarui'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui review: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $review = WebsiteReview::findOrFail($id);
            
            if ($review->gambar_profil) {
                Storage::disk('public')->delete($review->gambar_profil);
            }
            
            $review->delete();
            
            return response()->json(['message' => 'Review berhasil dihapus']);
        } catch (\Exception $e) {
            Log::error('Review delete error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
