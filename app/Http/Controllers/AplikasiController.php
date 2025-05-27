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
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $beranda = AplikasiBeranda::first() ?? new AplikasiBeranda();
        $beranda->description = $request->description;

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
            'nama_kamar' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gender' => 'required|in:pria,wanita,campur',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'harga' => 'required|numeric|min:0'
        ]);

        $kamar = AplikasiFasilitas::first() ?? new AplikasiFasilitas();
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->gender = $request->gender;
        $kamar->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            if ($kamar->gambar && Storage::disk('public')->exists($kamar->gambar)) {
                Storage::disk('public')->delete($kamar->gambar);
            }
            $kamar->gambar = $request->file('gambar')->store('kamar', 'public');
        }

        $kamar->save();

        return redirect()->route('admin.konten.aplikasi')->with('success', 'Kamar updated successfully.');
    }

    public function kamarIndex()
    {
        $kamars = AplikasiFasilitas::all();
        return view('admin.konten.aplikasi.kelola_kamar.index', compact('kamars'));
    }

    public function kamarStore(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gender' => 'required|in:pria,wanita,campur',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $kamar = new AplikasiFasilitas();
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->gender = $request->gender;
        $kamar->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            $kamar->gambar = $request->file('gambar')->store('kamar', 'public');
        }

        $kamar->save();

        return redirect()->route('admin.konten.aplikasi.kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function kamarEdit($id)
    {
        $kamar = AplikasiFasilitas::findOrFail($id);
        return response()->json($kamar);
    }

    public function kamarUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gender' => 'required|in:pria,wanita,campur',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $kamar = AplikasiFasilitas::findOrFail($id);
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->gender = $request->gender;
        $kamar->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            if ($kamar->gambar && Storage::disk('public')->exists($kamar->gambar)) {
                Storage::disk('public')->delete($kamar->gambar);
            }
            $kamar->gambar = $request->file('gambar')->store('kamar', 'public');
        }

        $kamar->save();

        return redirect()->route('admin.konten.aplikasi.kamar.index')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function kamarDestroy($id)
    {
        $kamar = AplikasiFasilitas::findOrFail($id);
        
        if ($kamar->gambar && Storage::disk('public')->exists($kamar->gambar)) {
            Storage::disk('public')->delete($kamar->gambar);
        }
        
        $kamar->delete();

        return response()->json(['success' => true]);
    }

    public function eventIndex()
    {
        $events = AplikasiEvent::all();
        return view('admin.konten.aplikasi.kelola_event.index', compact('events'));
    }

    public function eventStore(Request $request)
    {
        try {
            $request->validate([
                'nama_event' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'nullable|date',
                'lokasi' => 'nullable|string|max:255',
                'status' => 'required|in:upcoming,ongoing,completed,cancelled',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            ], [
                'nama_event.required' => 'Nama event harus diisi',
                'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
                'status.required' => 'Status event harus dipilih',
                'gambar.image' => 'File harus berupa gambar',
                'gambar.max' => 'Ukuran gambar maksimal 20MB'
            ]);

            $event = new AplikasiEvent();
            $event->nama_event = $request->nama_event;
            $event->deskripsi = $request->deskripsi;
            $event->tanggal_mulai = $request->tanggal_mulai;
            $event->tanggal_selesai = $request->tanggal_selesai;
            $event->lokasi = $request->lokasi;
            $event->status = $request->status;

            if ($request->hasFile('gambar')) {
                $event->gambar = $request->file('gambar')->store('aplikasi/event', 'public');
            }

            $event->save();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Event berhasil ditambahkan'
                ], 200);
            }

            return redirect()
                ->route('admin.konten.aplikasi')
                ->with('success', 'Event berhasil ditambahkan');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            }
            return back()
                ->withErrors($e->errors())
                ->withInput();
                
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menyimpan event'
                ], 500);
            }
            return back()
                ->with('error', 'Terjadi kesalahan saat menyimpan event')
                ->withInput();
        }
    }

    public function eventEdit($id)
    {
        $event = AplikasiEvent::findOrFail($id);
        return response()->json($event);
    }

    public function eventUpdate(Request $request, $id) 
    {
        try {
            $request->validate([
                'nama_event' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'nullable|date',
                'lokasi' => 'nullable|string|max:255', 
                'status' => 'required|in:upcoming,ongoing,completed,cancelled',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            ], [
                'nama_event.required' => 'Nama event harus diisi',
                'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
                'status.required' => 'Status event harus dipilih',
                'gambar.image' => 'File harus berupa gambar',
                'gambar.max' => 'Ukuran gambar maksimal 20MB'
            ]);

            $event = AplikasiEvent::findOrFail($id);
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

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Event berhasil diperbarui'
                ], 200);
            }

            return redirect()
                ->route('admin.konten.aplikasi')
                ->with('success', 'Event berhasil diperbarui');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            }
            return back()
                ->withErrors($e->errors())
                ->withInput();
                
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memperbarui event'
                ], 500);
            }
            return back()
                ->with('error', 'Terjadi kesalahan saat memperbarui event')
                ->withInput();
        }
    }

    public function eventDestroy($id)
    {
        try {
            $event = AplikasiEvent::findOrFail($id);
            
            if ($event->gambar && Storage::disk('public')->exists($event->gambar)) {
                Storage::disk('public')->delete($event->gambar);
            }
            
            $event->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Event berhasil dihapus'
                ], 200);
            }

            return redirect()
                ->route('admin.konten.aplikasi')
                ->with('success', 'Event berhasil dihapus');

        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus event'
                ], 500);
            }
            return back()->with('error', 'Terjadi kesalahan saat menghapus event');
        }
    }

    public function fasilitasStore(Request $request)
    {
        try {
            $request->validate([
                'nama_kamar' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'gender' => 'required|in:pria,wanita,campur',
                'type_kamar' => 'required|in:vip,vvip,regular,barrak',
                'kategori' => 'required|in:bieplus,brilliant_selatan',
                'harga' => 'required|numeric|min:0',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
            ]);

            $kamar = new AplikasiFasilitas();
            $kamar->nama_kamar = $request->nama_kamar;
            $kamar->deskripsi = $request->deskripsi;
            $kamar->gender = $request->gender;
            $kamar->type_kamar = $request->type_kamar;
            $kamar->kategori = $request->kategori;
            $kamar->harga = $request->harga;

            if ($request->hasFile('gambar')) {
                $kamar->gambar = $request->file('gambar')->store('kamar', 'public');
            }

            $kamar->save();

            return response()->json([
                'success' => true,
                'message' => 'Kamar berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan kamar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function fasilitasEdit($id)
    {
        try {
            $kamar = AplikasiFasilitas::findOrFail($id);
            return response()->json($kamar);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }

    public function fasilitasUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_kamar' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'gender' => 'required|in:pria,wanita,campur',
                'type_kamar' => 'required|in:vip,vvip,regular,barrak',
                'kategori' => 'required|in:bieplus,brilliant_selatan',
                'harga' => 'required|numeric|min:0',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
            ]);

            $kamar = AplikasiFasilitas::findOrFail($id);
            $kamar->nama_kamar = $request->nama_kamar;
            $kamar->deskripsi = $request->deskripsi;
            $kamar->gender = $request->gender;
            $kamar->type_kamar = $request->type_kamar;
            $kamar->kategori = $request->kategori;
            $kamar->harga = $request->harga;

            if ($request->hasFile('gambar')) {
                if ($kamar->gambar) {
                    Storage::disk('public')->delete($kamar->gambar);
                }
                $kamar->gambar = $request->file('gambar')->store('kamar', 'public');
            }

            $kamar->save();

            return response()->json([
                'success' => true,
                'message' => 'Kamar berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui kamar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        $beranda = AplikasiBeranda::first();
        $event = AplikasiEvent::first();
        $events = AplikasiEvent::all();
        $fasilitas = AplikasiFasilitas::all();
        
        return view('admin.konten.aplikasi.aplikasi', compact('beranda', 'event', 'events', 'fasilitas'));
    }
}
