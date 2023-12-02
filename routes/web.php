<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// TAMPILAN
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::get('/register', [PageController::class, 'register'])->name('register');
    Route::get('/forgot-password', [PageController::class, 'forgotpass'])->name('forgot-password');
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/pasien', [PageController::class, 'pasien'])->name('pasien');
    Route::get('/setting-profile', [PageController::class, 'profile'])->name('setting-profile');
    Route::get('/detail-aktivitas', [PageController::class, 'show_aktvitas'])->name('detail-aktivitas');
    Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
    Route::get('/detail-artikel', [PageController::class, 'show_artikel'])->name('detail-artikel');
// END Tampilan


