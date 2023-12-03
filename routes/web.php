<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::middleware(['middleware' => 'guest'])->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::get('/register', [PageController::class, 'register'])->name('register');
    Route::get('/forgot-password', [PageController::class, 'forgotpass'])->name('forgot-password');
    // Backend
        Route::post('/register/proses', [UserController::class, 'register'])->name('regiter.proses');
        Route::post('/login/proses', [UserController::class, 'login'])->name('login.proses');
    // END Backend
});
// Route::group(['middleware' => ['CheckAuth']], function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/pasien', [PageController::class, 'pasien'])->name('pasien');
    Route::get('/setting-profile', [PageController::class, 'profile'])->name('setting-profile');
    Route::get('/detail-aktivitas', [PageController::class, 'show_aktvitas'])->name('detail-aktivitas');
    Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
    Route::get('/detail-artikel', [PageController::class, 'show_artikel'])->name('detail-artikel');
// });