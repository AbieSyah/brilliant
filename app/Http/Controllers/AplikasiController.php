<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AplikasiBeranda;
use App\Models\AplikasiEvent;
use App\Models\AplikasiFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AplikasiController extends Controller
{
    public function updateBeranda(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $beranda = AplikasiBeranda::first() ?? new AplikasiBeranda();
        $beranda->title = $request->title;
        $beranda->description = $request->description;
        $beranda->button_text = $request->button_text;

        if ($request->hasFile('image')) {
            if ($beranda->image && Storage::disk('public')->exists($beranda->image)) {
                Storage::disk('public')->delete($beranda->image);
            }
            $beranda->image = $request->file('image')->store('aplikasi/beranda', 'public');
        }

        $beranda->save();

        return redirect()->route('admin.konten.aplikasi')->with('success', 'Beranda updated successfully.');
    }

    public function updateEvent(Request $request)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'lokasi' => 'nullable|string|max:255',
            'status' => 'required|in:upcoming,ongoing,completed,cancelled',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $event = AplikasiEvent::first() ?? new AplikasiEvent();
        $event->nama_event = $request->nama_event;
        $event->deskripsi = $request->deskripsi;
        $event->tanggal_mulai = $request->tanggal_mulai;
        $event->tanggal_selesai = $request->tanggal_selesai;
        $event->lokasi = $request->lokasi;
        $event->status = $request->status;

        if ($request->hasFile('gambar')) {
            if ($event->gambar && Storage::disk('public')->exists($event->gambar)) {
                Storage::disk('public')->delete($event->gambar);
            }
            $event->gambar = $request->file('gambar')->store('aplikasi/event', 'public');
        }

        $event->save();

        return redirect()->route('admin.konten.aplikasi')->with('success', 'Event updated successfully.');
    }

    public function updateFasilitas(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $fasilitas = AplikasiFasilitas::first() ?? new AplikasiFasilitas();
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->deskripsi = $request->deskripsi;
        $fasilitas->icon = $request->icon;

        if ($request->hasFile('gambar')) {
            if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
                Storage::disk('public')->delete($fasilitas->gambar);
            }
            $fasilitas->gambar = $request->file('gambar')->store('aplikasi/fasilitas', 'public');
        }

        $fasilitas->save();

        return redirect()->route('admin.konten.aplikasi')->with('success', 'Fasilitas updated successfully.');
    }
}
