<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\WebsiteBerandaController;
use App\Http\Controllers\WebsiteGaleriController;
use App\Http\Controllers\WebsiteFasilitasController;
use App\Http\Controllers\WebsiteBookingController;
use App\Http\Controllers\WebsiteFooterController;
use App\Http\Controllers\AplikasiController; // Points to controller_api folder
use App\Http\Controllers\UserAplikasiController;
use App\Models\AplikasiBeranda;
use App\Models\AplikasiEvent;
use App\Models\AplikasiFasilitas;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/home', function () {
    return view('home');
});

Route::get('/chart', function () {
    return view('chart');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/adminn', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::prefix('admin/konten')->name('admin.konten.')->group(function () {
        // Website routes with all data
        Route::get('/website', function () {
            $beranda = \App\Models\WebsiteBeranda::first();
            $galeri = \App\Models\WebsiteGaleri::first();
            $fasilitas = \App\Models\WebsiteFasilitas::first();
            $booking = \App\Models\WebsiteBooking::first();
            $footer = \App\Models\WebsiteFooter::first();

            return view('admin.konten.website.website', compact(
                'beranda',
                'galeri',
                'fasilitas',
                'booking',
                'footer'
            ));
        })->name('website');
        // CRUD route for Beranda
        Route::post('/website/beranda/update', [WebsiteBerandaController::class, 'update'])
            ->name('website.beranda.update');
        Route::post('/website/galeri/update', [WebsiteGaleriController::class, 'update'])
            ->name('website.galeri.update');

        Route::post('/website/fasilitas/update', [WebsiteFasilitasController::class, 'update'])
            ->name('website.fasilitas.update');

        Route::post('/website/booking/update', [WebsiteBookingController::class, 'update'])
            ->name('website.booking.update');

        Route::post('/website/footer/update', [WebsiteFooterController::class, 'update'])
            ->name('website.footer.update');

        // Existing website content routes
        Route::get('/galeri', function () {
            return view('admin.konten.website.galeri');
        })->name('galeri');

        Route::get('/fasilitas', function () {
            return view('admin.konten.website.fasilitas');
        })->name('fasilitas');

        Route::get('/booking', function () {
            return view('admin.konten.website.booking');
        })->name('booking');

        Route::get('/footer', function () {
            return view('admin.konten.website.footer');
        })->name('footer');

        // Aplikasi routes with data
        Route::get('/aplikasi', function () {
            $beranda = \App\Models\AplikasiBeranda::first();
            $event = \App\Models\AplikasiEvent::first();
            $fasilitas = \App\Models\AplikasiFasilitas::all(); // Change first() to all()
            $events = \App\Models\AplikasiEvent::all(); // Add this line
            
            return view('admin.konten.aplikasi.aplikasi', compact(
                'beranda',
                'event',
                'events', // Add this
                'fasilitas'
            ));
        })->name('aplikasi');

        // CRUD routes for Aplikasi content
        Route::post('/aplikasi/beranda/update', [AplikasiController::class, 'updateBeranda'])
            ->name('aplikasi.beranda.update');
        Route::post('/aplikasi/event/update', [AplikasiController::class, 'updateEvent'])
            ->name('aplikasi.event.update');
        Route::post('/aplikasi/fasilitas/update', [AplikasiController::class, 'updateFasilitas'])
            ->name('aplikasi.fasilitas.update');
    });

    Route::prefix('admin/konten/aplikasi')->group(function () {
        Route::get('/', [AplikasiController::class, 'index'])->name('admin.konten.aplikasi');
        
        // Event routes
        Route::post('/event', [AplikasiController::class, 'eventStore'])->name('admin.konten.aplikasi.event.store');
        Route::get('/event/{id}/edit', [AplikasiController::class, 'eventEdit'])->name('admin.konten.aplikasi.event.edit');
        Route::put('/event/{id}', [AplikasiController::class, 'eventUpdate'])->name('admin.konten.aplikasi.event.update');
        Route::delete('/event/{id}', [AplikasiController::class, 'eventDestroy'])->name('admin.konten.aplikasi.event.delete');
        
        // Fasilitas routes
        Route::post('/fasilitas', [AplikasiController::class, 'fasilitasStore'])->name('admin.konten.aplikasi.fasilitas.store');
        Route::get('/fasilitas/{id}/edit', [AplikasiController::class, 'fasilitasEdit'])->name('admin.konten.aplikasi.fasilitas.edit');
        Route::put('/fasilitas/{id}', [AplikasiController::class, 'fasilitasUpdate'])->name('admin.konten.aplikasi.fasilitas.update');
        Route::delete('/fasilitas/{id}', [AplikasiController::class, 'fasilitasDestroy'])->name('admin.konten.aplikasi.fasilitas.destroy');
    });

    // Pesanan routes
    Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('admin.pesanan.main');
    Route::get('/admin/pesanan/history', [PesananController::class, 'history'])->name('admin.pesanan.history');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('check.age')
    ->name('register.store');

Route::get('password/reset', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('password/reset', [App\Http\Controllers\ResetPasswordController::class, 'update'])->name('password.update');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [LoginController::class, 'getProfile']);
    Route::post('/profile/update', [LoginController::class, 'updateProfile']);
    Route::post('/logout', [LoginController::class, 'logout']);
});




