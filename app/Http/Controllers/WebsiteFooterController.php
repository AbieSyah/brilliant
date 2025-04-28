<?php

namespace App\Http\Controllers;

use App\Models\WebsiteFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebsiteFooterController extends Controller
{
    public function update(Request $request)
    {
        try {
            $request->validate([
                'footer_address' => 'nullable|string',
                'footer_email' => 'nullable|email',
                'footer_phone' => 'nullable|string|max:20',
                'footer_facebook' => 'nullable|url',
                'footer_instagram' => 'nullable|url'
            ]);

            $footer = WebsiteFooter::first() ?? new WebsiteFooter();
            
            $footer->footer_address = $request->footer_address;
            $footer->footer_email = $request->footer_email;
            $footer->footer_phone = $request->footer_phone;
            $footer->footer_facebook = $request->footer_facebook;
            $footer->footer_instagram = $request->footer_instagram;

            $footer->save();

            return redirect()->route('admin.konten.website')
                ->with('success', 'Footer berhasil diperbarui');

        } catch (\Exception $e) {
            Log::error('Footer update error:', ['error' => $e->getMessage()]);
            return redirect()->route('admin.konten.website')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
