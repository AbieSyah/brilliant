<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class WebsiteBookingController extends Controller
{
    public function update(Request $request)
    {
        try {
            $request->validate([
                'booking_title' => 'nullable|string|max:255',
                'booking_description' => 'nullable|string',
                'booking_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
            ]);

            $booking = WebsiteBooking::first() ?? new WebsiteBooking();
            
            $booking->booking_title = $request->booking_title;
            $booking->booking_description = $request->booking_description;

            if ($request->hasFile('booking_image')) {
                // Delete old image if exists
                if ($booking->booking_image && Storage::disk('public')->exists($booking->booking_image)) {
                    Storage::disk('public')->delete($booking->booking_image);
                }

                $file = $request->file('booking_image');
                $filename = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
                $path = $file->storeAs('booking', $filename, 'public');
                
                if (!$path) {
                    throw new \Exception('Failed to store the image');
                }

                $booking->booking_image = $path;
                Log::info('Booking image stored at: ' . $path);
            }

            $booking->save();

            return redirect()->route('admin.konten.website')
                ->with('success', 'Booking content berhasil diperbarui');

        } catch (\Exception $e) {
            Log::error('Booking update error:', ['error' => $e->getMessage()]);
            return redirect()->route('admin.konten.website')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
