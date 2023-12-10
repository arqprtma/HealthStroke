<?php

use App\Http\Controllers\AdminController;
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
Route::middleware(['middleware' => 'CheckAuth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/pasien', [PageController::class, 'pasien'])->name('pasien');
    Route::get('/setting-profile', [PageController::class, 'profile'])->name('setting-profile');
    Route::get('/detail-aktivitas', [PageController::class, 'show_aktivitas'])->name('detail-aktivitas');
    Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
    Route::get('/detail-artikel', [PageController::class, 'show_artikel'])->name('detail-artikel');

    // Admin
    Route::name('admin.')->group(function () {
        Route::get('/dashboard-admin', [PageController::class, 'admin_dashboard'])->name('index');
        Route::get('/pemicu', [PageController::class, 'admin_pemicu'])->name('pemicu');
        Route::get('/pemicu', [PageController::class, 'admin_pemicu'])->name('pemicu');
        Route::delete('/pemicu/{id?}', [AdminController::class, 'destroy_pemicu'])->name('pemicu.delete');
        Route::put('/pemicu/{id?}', [AdminController::class, 'update_pemicu'])->name('pemicu.update');
        Route::post('/pemicu/proses', [AdminController::class, 'store_pemicu'])->name('pemicu.post');

        Route::get('/komplikasi', [PageController::class, 'admin_komplikasi'])->name('komplikasi');
        Route::delete('/komplikasi/{id?}', [AdminController::class, 'destroy_komplikasi'])->name('komplikasi.delete');
        Route::put('/komplikasi/{id?}', [AdminController::class, 'update_komplikasi'])->name('komplikasi.update');
        Route::post('/komplikasi/proses', [AdminController::class, 'store_komplikasi'])->name('komplikasi.post');

        Route::get('/aktivitas', [PageController::class, 'admin_aktivitas'])->name('aktivitas');
        Route::get('/aktivitas/tambah', [PageController::class, 'admin_tambah_aktivitas'])->name('aktivitas.tambah');
        Route::get('/aktivitas/kategori/tambah', [PageController::class, 'admin_tambah_kategori_aktivitas'])->name('aktivitas.kategori.tambah');
        Route::post('/aktivitas/kategori/store', [AdminController::class, 'admin_store_kategori_aktivitas'])->name('aktivitas.kategori.store');
        Route::get('/aktivitas/edit/{id?}', [PageController::class, 'admin_edit_aktivitas'])->name('aktivitas.edit');
        Route::put('/aktivitas/edit/{id?}', [AdminController::class, 'update_aktivitas'])->name('aktivitas.update');
        Route::post('/aktivitas/store', [AdminController::class, 'admin_store_aktivitas'])->name('aktivitas.store');
        Route::delete('/aktivitas/{id?}', [AdminController::class, 'destroy_aktivitas'])->name('aktivitas.delete');
    });
});

// Route::prefix('admin')->group(function(){
    Route::get('/login-admin', [PageController::class, 'login_admin'])->name('login.admin');
// });
