<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/symlink', function () {
    Artisan::call('storage:link');
});

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
Route::middleware(['CheckAuth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/pasien', [PageController::class, 'pasien'])->name('pasien');
    Route::get('/pasien/{id}', [PageController::class, 'pasien_id'])->name('pasien.update');
    Route::post('/pasien/{id}/update', [UserController::class, 'pasien_update'])->name('setting-pasien');
    Route::post('/pasien', [UserController::class, 'pasien_store'])->name('pasien.post');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::any('/profile/{id}', [UserController::class, 'profile'])->name('setting-profile');
    Route::get('/detail-aktivitas/{id}', [PageController::class, 'show_aktivitas'])->name('detail-aktivitas');
    Route::get('/detail-penanganan/{id}', [PageController::class, 'show_penanganan'])->name('detail-penanganan');
    Route::get('/detail-aktivitas/{id}/proses', [UserController::class, 'add_log_aktivitas'])->name('add-log-aktivitas');
    Route::get('/detail-penanganan/{id}/proses', [UserController::class, 'add_log_penanganan'])->name('add-log-penanganan');

    Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
    Route::get('/detail-artikel/{id}', [PageController::class, 'show_artikel'])->name('detail-artikel');

    // Get Filter Date for Chart
    Route::get('/dashboard/get-data-for-chart', [UserController::class, 'getDataForChart'])->name('dashboard.filterDate');


    // Admin
    Route::middleware(['AdminCheck'])->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/admin/dashboard', [PageController::class, 'admin_dashboard'])->name('index');
            Route::get('/admin/pemicu', [PageController::class, 'admin_pemicu'])->name('pemicu');
            Route::get('/admin/pemicu', [PageController::class, 'admin_pemicu'])->name('pemicu');
            Route::delete('/admin/pemicu/{id?}', [AdminController::class, 'destroy_pemicu'])->name('pemicu.delete');
            Route::put('/admin/pemicu/{id?}', [AdminController::class, 'update_pemicu'])->name('pemicu.update');
            Route::post('/admin/pemicu/proses', [AdminController::class, 'store_pemicu'])->name('pemicu.post');

            Route::get('/admin/komplikasi', [PageController::class, 'admin_komplikasi'])->name('komplikasi');
            Route::delete('/admin/komplikasi/{id?}', [AdminController::class, 'destroy_komplikasi'])->name('komplikasi.delete');
            Route::put('/admin/komplikasi/{id?}', [AdminController::class, 'update_komplikasi'])->name('komplikasi.update');
            Route::post('/admin/komplikasi/proses', [AdminController::class, 'store_komplikasi'])->name('komplikasi.post');

            Route::get('/admin/aktivitas', [PageController::class, 'admin_aktivitas'])->name('aktivitas');
            Route::get('/admin/aktivitas/tambah', [PageController::class, 'admin_tambah_aktivitas'])->name('aktivitas.tambah');
            Route::get('/admin/aktivitas/kategori/tambah', [PageController::class, 'admin_tambah_kategori_aktivitas'])->name('aktivitas.kategori.tambah');
            Route::post('/admin/aktivitas/kategori/store', [AdminController::class, 'admin_store_kategori_aktivitas'])->name('aktivitas.kategori.store');
            Route::get('/admin/aktivitas/edit/{id?}', [PageController::class, 'admin_edit_aktivitas'])->name('aktivitas.edit');
            Route::put('/admin/aktivitas/edit/{id?}', [AdminController::class, 'update_aktivitas'])->name('aktivitas.update');
            Route::post('/admin/aktivitas/store', [AdminController::class, 'admin_store_aktivitas'])->name('aktivitas.store');
            Route::delete('/admin/aktivitas/{id?}', [AdminController::class, 'destroy_aktivitas'])->name('aktivitas.delete');

            Route::get('/admin/penanganan', [PageController::class, 'admin_penanganan'])->name('penanganan');
            Route::get('/admin/penanganan/tambah', [PageController::class, 'admin_tambah_penanganan'])->name('penanganan.tambah');
            Route::get('/admin/penanganan/kategori/tambah', [PageController::class, 'admin_tambah_kategori_penanganan'])->name('penanganan.kategori.tambah');
            Route::post('/admin/penanganan/kategori/store', [AdminController::class, 'admin_store_kategori_penanganan'])->name('penanganan.kategori.store');
            Route::get('/admin/penanganan/edit/{id?}', [PageController::class, 'admin_edit_penanganan'])->name('penanganan.edit');
            Route::put('/admin/penanganan/edit/{id?}', [AdminController::class, 'update_penanganan'])->name('penanganan.update');
            Route::post('/admin/penanganan/store', [AdminController::class, 'admin_store_penanganan'])->name('penanganan.store');
            Route::delete('/admin/penanganan/{id?}', [AdminController::class, 'destroy_penanganan'])->name('penanganan.delete');

            // Artikel
            Route::get('/admin/artikel', [PageController::class, 'admin_artikel'])->name('artikel');
            Route::get('/admin/artikel/tambah', [PageController::class, 'admin_tambah_artikel'])->name('artikel.tambah');
            Route::post('/admin/artikel/store', [AdminController::class, 'admin_store_artikel'])->name('artikel.store');
            Route::get('/admin/artikel/edit/{id?}', [PageController::class, 'admin_edit_artikel'])->name('artikel.edit');
            Route::put('/admin/artikel/edit/{id?}', [AdminController::class, 'update_artikel'])->name('artikel.update');
            Route::delete('/admin/artikel/{id?}', [AdminController::class, 'destroy_artikel'])->name('artikel.delete');
        });
    });
});

// Route::prefix('admin')->group(function(){
    Route::get('/login/admin', [PageController::class, 'login_admin'])->name('login.admin');
// });
