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

Route::get('/home',function(){
    return view('home');
});

Route::get('/chart', function () {
    return view('chart');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/adminn', function () {
        return view('admin.index');
    });
    Route::get('/adminn', [DatatableController::class, 'index'])->name('datatable.index');

    Route::get('/adminn/tables', function () {
        $datatable = \App\Models\Datatable::all(); // Sesuaikan dengan model Anda
        return view('admin.tables', compact('datatable'));
    })->name('dashboard.tables');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('check.age')
    ->name('register.store');

Route::get('password/reset', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('password/reset', [App\Http\Controllers\ResetPasswordController::class, 'update'])->name('password.update');

Route::resource('datatable', DatatableController::class);





