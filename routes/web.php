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
use App\Http\Controllers\WebsiteReviewController;
use App\Http\Controllers\AplikasiController; // Points to controller_api folder
use App\Http\Controllers\UserAplikasiController;
use App\Models\AplikasiBeranda;
use App\Models\AplikasiEvent;
use App\Models\AplikasiFasilitas;
use App\Models\WebsiteReview;
use App\Models\WebsiteGaleri;

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
        // Website routes with data
        Route::get('/website', function () {
            $beranda = \App\Models\WebsiteBeranda::first();
            $galeri = \App\Models\WebsiteGaleri::all();
            $fasilitas = \App\Models\WebsiteFasilitas::all();
            $reviews = \App\Models\WebsiteReview::all();

            return view('admin.konten.website.website', compact(
                'beranda',
                'galeri',
                'fasilitas',
                'reviews'
            ));
        })->name('website');

        Route::prefix('website')->group(function () {
            // Beranda routes
            Route::post('/beranda/update', [WebsiteBerandaController::class, 'update'])
                ->name('website.beranda.update');
                
            // Galeri routes
            Route::post('/galeri/update', [WebsiteGaleriController::class, 'update'])
                ->name('website.galeri.update');
                
            // Fasilitas routes
            Route::prefix('fasilitas')->name('website.fasilitas.')->group(function () {
                Route::post('/', [WebsiteFasilitasController::class, 'store'])->name('store');
                Route::post('/update', [WebsiteFasilitasController::class, 'update'])->name('update'); // Changed route
                Route::get('/{id}/edit', [WebsiteFasilitasController::class, 'edit'])->name('edit');
                Route::delete('/{id}', [WebsiteFasilitasController::class, 'destroy'])->name('destroy');
            });
            
            // Review routes
            Route::prefix('review')->name('website.review.')->group(function () {
                Route::post('/store', [WebsiteReviewController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [WebsiteReviewController::class, 'edit'])->name('edit');
                Route::put('/{id}', [WebsiteReviewController::class, 'update'])->name('update');
                Route::delete('/{id}', [WebsiteReviewController::class, 'destroy'])->name('destroy');
            });

            // Galeri routes
            Route::prefix('galeri')->name('website.galeri.')->group(function () {
                Route::post('/image', [WebsiteGaleriController::class, 'storeImage'])->name('store.image');
                Route::post('/video', [WebsiteGaleriController::class, 'storeVideo'])->name('store.video');
                Route::post('/video-url', [WebsiteGaleriController::class, 'storeVideoUrl'])->name('store.video.url');
                Route::delete('/{id}', [WebsiteGaleriController::class, 'destroy'])->name('destroy');
            });
        });

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

        // Review routes
        Route::prefix('website/review')->name('website.review.')->group(function () {
            Route::post('/store', [WebsiteReviewController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [WebsiteReviewController::class, 'edit'])->name('edit');
            Route::put('/{id}', [WebsiteReviewController::class, 'update'])->name('update');
            Route::delete('/{id}', [WebsiteReviewController::class, 'destroy'])->name('destroy');
        });
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
        Route::delete('/fasilitas/{id}', [AplikasiController::class, 'fasilitasDestroy'])->name('admin.konten.aplikasi.fasilitas.destroy');    })
        ;

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




