<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DatatableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

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
    })->name('admin.dashboard'); // This is the main dashboard route

    // Website Content Management Routes
    Route::prefix('admin/konten')->name('admin.konten.')->group(function () {
        // Website routes
        Route::get('/website', function () {
            return view('admin.konten.website.website');
        })->name('website');

        Route::get('/beranda', function () {
            return view('admin.konten.website.beranda');
        })->name('beranda');

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

        // Aplikasi routes
        Route::get('/aplikasi', function () {
            return view('admin.konten.aplikasi.aplikasi');
        })->name('aplikasi');

        Route::get('/aplikasi/beranda', function () {
            return view('admin.konten.aplikasi.beranda');
        })->name('beranda.aplikasi');

        Route::get('/aplikasi/galeri', function () {
            return view('admin.konten.aplikasi.galeri');
        })->name('galeri.aplikasi');

        Route::get('/aplikasi/fasilitas', function () {
            return view('admin.konten.aplikasi.fasilitas');
        })->name('fasilitas.aplikasi');

        Route::get('/aplikasi/booking', function () {
            return view('admin.konten.aplikasi.booking');
        })->name('booking.aplikasi');

        Route::get('/aplikasi/footer', function () {
            return view('admin.konten.aplikasi.footer');
        })->name('footer.aplikasi');

        Route::get('/aplikasi/kamar', function () {
            return view('admin.konten.aplikasi.kamar');
        })->name('kamar.aplikasi');
    });

    // Tables route
    Route::get('/adminn/tables', function () {
        $datatable = \App\Models\Datatable::all();
        return view('admin.tables', compact('datatable'));
    })->name('dashboard.tables');

    // If you need the datatable functionality, move it to a different route
    Route::get('/adminn/data', [DatatableController::class, 'index'])->name('datatable.index');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('check.age')
    ->name('register.store');

Route::get('password/reset', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('password/reset', [App\Http\Controllers\ResetPasswordController::class, 'update'])->name('password.update');

Route::resource('datatable', DatatableController::class);





