<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware(['middleware' => 'guest'])->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::get('/forgot-password/proses', [UserController::class, 'kirimEmail'])->name('forgot-password-proses');
    Route::get('/register', [PageController::class, 'register'])->name('register');
    Route::get('/forgot-password', [PageController::class, 'forgotpass'])->name('forgot-password');
    // Backend
        Route::post('/register/proses', [UserController::class, 'register'])->name('regiter.proses');
        Route::post('/login/proses', [UserController::class, 'login'])->name('login.proses');

        // forgot password cofirm email
        Route::post('/forgot-password', function (Request $request) {
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['status' => __($status)])
                        : back()->withErrors(['email' => __($status)]);
        })->middleware('guest')->name('password.email');

        // reset password get by token email
        Route::get('/reset-password/{token}', function (string $token) {
            return view('auth.reset-password', ['token' => $token]);
        })->middleware('guest')->name('password.reset');

        // reset password - post
        Route::post('/reset-password', function (Request $request) {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                        ? redirect()->route('login')->with('status', __($status))
                        : back()->withErrors(['email' => [__($status)]]);
        })->middleware('guest')->name('password.update');


    // END Backend
});
Route::middleware(['CheckAuth', 'verified'])->group(function () {
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

            // trigered aktivitas
            Route::get('/admin/trigered-aktivitas', [PageController::class, 'trigered_aktivitas'])->name('trigered.aktivitas');
            Route::get('/admin/trigered-aktivitas/tambah', [PageController::class, 'trigered_tambah_aktivitas'])->name('trigered.aktivitas.tambah');
            Route::post('/admin/trigered-aktivitas/tambah', [AdminController::class, 'trigered_store_aktivitas'])->name('trigered.aktivitas.store');
            Route::get('/admin/trigered-aktivitas/edit/{id?}', [PageController::class, 'trigered_edit_aktivitas'])->name('trigered.aktivitas.edit');
            Route::put('/admin/trigered-aktivitas/edit/{id?}', [AdminController::class, 'trigered_upload_aktivitas'])->name('trigered.aktivitas.update');
            Route::delete('/admin/trigered-aktivitas/{id?}', [AdminController::class, 'trigered_destroy_aktivitas'])->name('trigered.aktivitas.delete');

            // trigered penanganan
            Route::get('/admin/trigered-penanganan', [PageController::class, 'trigered_penanganan'])->name('trigered.penanganan');
            Route::get('/admin/trigered-penanganan/tambah', [PageController::class, 'trigered_tambah_penanganan'])->name('trigered.penanganan.tambah');
            Route::post('/admin/trigered-penanganan/tambah', [AdminController::class, 'trigered_store_penanganan'])->name('trigered.penanganan.store');
            Route::get('/admin/trigered-penanganan/edit/{id?}', [PageController::class, 'trigered_edit_penanganan'])->name('trigered.penanganan.edit');
            Route::put('/admin/trigered-penanganan/edit/{id?}', [AdminController::class, 'trigered_upload_penanganan'])->name('trigered.penanganan.update');
            Route::delete('/admin/trigered-penanganan/{id?}', [AdminController::class, 'trigered_destroy_penanganan'])->name('trigered.penanganan.delete');

        });
    });
});

// Route::prefix('admin')->group(function(){
    Route::get('/login/admin', [PageController::class, 'login_admin'])->name('login.admin');
// });
