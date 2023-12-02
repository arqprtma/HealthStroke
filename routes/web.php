<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->name('dashboard');

Route::get('/pasien', function () {
    return view('auth.user.pasien.profile-pasien');
})->name('pasien');

Route::get('/setting-profile', function( ){
    return view('auth.profile-user');
})->name('setting-profile');

Route::get('/detail-aktivitas', function( ){
    return view('auth.user.pasien.detail-aktivitas');
})->name('detail-aktivitas');

Route::get('/artikel', function( ){
    return view('auth.user.artikel.artikel');
})->name('artikel');

Route::get('/detail-artikel', function( ){
    return view('auth.user.artikel.detail-artikel');
})->name('detail-artikel');


