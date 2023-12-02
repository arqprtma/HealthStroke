<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request) {
        $data = [
            'title' => 'Flash Screen',
        ];
        return view('welcome', $data);
    }

    public function login(Request $request) {
        $data = [
            'title' => 'Login | StrokeCare',
        ];
        return view('login', $data);
    }

    public function register(Request $request) {
        $data = [
            'title' => 'Register | StrokeCare',
        ];
        return view('register', $data);
    }

    public function forgotpass(Request $request) {
        $data = [
            'title' => 'Forgot Password | StrokeCare',
        ];
        return view('forgot-password', $data);
    }

    // Auth
    public function dashboard(Request $request) {
        $data = [
            'title' => 'Dashboard | StrokeCare',
        ];
        return view('auth.dashboard', $data);
    }

    public function pasien(Request $request) {
        $data = [
            'title' => 'Pasien | StrokeCare',
        ];
        return view('auth.user.pasien.profile-pasien', $data);
    }

    public function profile(Request $request) {
        $data = [
            'title' => 'Profile | StrokeCare',
        ];
        return view('auth.profile-user', $data);
    }

    public function show_aktivitas(Request $request) {
        $data = [
            'title' => 'Profile Settings | StrokeCare',
        ];
        return view('auth.user.pasien.detail-aktivitas', $data);
    }

    public function artikel(Request $request) {
        $data = [
            'title' => 'Artikel | StrokeCare',
        ];
        return view('auth.user.artikel.artikel', $data);
    }
    
    public function show_artikel(Request $request) {
        $data = [
            'title' => 'Overview Artikel | StrokeCare',
        ];
        return view('auth.user.artikel.detail-artikel', $data);
    }
}
