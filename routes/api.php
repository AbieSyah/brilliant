<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AplikasiController;
use App\Http\Controllers\Api\UserAplikasiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Remove v1 prefix temporarily for testing
Route::post('register', [UserAplikasiController::class, 'register']);
Route::post('login', [UserAplikasiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [UserAplikasiController::class, 'getProfile']);
    Route::post('logout', [UserAplikasiController::class, 'logout']);
    Route::put('profile/update', [UserAplikasiController::class, 'updateProfile']);
});

// Application routes
Route::prefix('aplikasi')->group(function () {
    Route::get('/beranda', [AplikasiController::class, 'getBeranda']);
    Route::get('/event', [AplikasiController::class, 'getEvent']);
    Route::get('/fasilitas', [AplikasiController::class, 'getFasilitas']);
});