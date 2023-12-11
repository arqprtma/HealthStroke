<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Kategori_aktivitas;
use App\Models\Kategori_penanganan;
use App\Models\Komplikasi;
use App\Models\Pemicu;
use App\Models\Penanganan;
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
        // dd(auth()->user());
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

    // Admin
        public function login_admin(Request $request) {
            $data = [
                'title' => 'Login Admin | StrokeCare',
            ];
            // dd('coba');

            return view('auth.admin.login', $data);
        }
        public function admin_dashboard() {
            $data = [
                'title' => 'Dashboard Admin | StrokeCare',
            ];

            return view('auth.admin.index', $data);
        }
        public function admin_pemicu() {
            $pemicu = Pemicu::select('id_pemicu','nama')->get();

            $data = [
                'title' => 'Pemicu Admin | StrokeCare',
                'pemicu' => $pemicu,
            ];

            return view('auth.admin.pemicu.index', $data);
        }
        public function admin_komplikasi() {
            $komplikasi = Komplikasi::select('id_komplikasi','nama')->get();

            $data = [
                'title' => 'Komplikasi Admin | StrokeCare',
                'komplikasi' => $komplikasi,
            ];

            return view('auth.admin.komplikasi.index', $data);
        }
        public function admin_aktivitas() {
            $aktivitas = Aktivitas::with('pemicu','komplikasi','kategori_aktivitas')->get();

            $data = [
                'title' => 'Aktivitas Admin | StrokeCare',
                'aktivitas' => $aktivitas,
            ];

            return view('auth.admin.aktivitas.index', $data);
        }
        public function admin_tambah_aktivitas() {
            $kat_aktivitas = Kategori_aktivitas::select('id_kat_aktivitas','nama')->get();
            $pemicu = Pemicu::select('id_pemicu','nama')->get();
            $komplikasi = Komplikasi::select('id_komplikasi','nama')->get();

            $data = [
                'title' => 'Tambah Aktivitas | StrokeCare',
                'kat_aktivitas' => $kat_aktivitas,
                'pemicu' => $pemicu,
                'komplikasi' => $komplikasi,
            ];

            return view('auth.admin.aktivitas.aktivitas', $data);
        }
        public function admin_tambah_kategori_aktivitas() {
            $data = [
                'title' => 'Tambah Kategori Aktivitas | StrokeCare',
            ];

            return view('auth.admin.aktivitas.kategori_aktivitas', $data);
        }
        public function admin_edit_aktivitas($id) {
            $aktivitas = Aktivitas::where('id_aktivitas', $id)->first();

            $kat_aktivitas = Kategori_aktivitas::select('id_kat_aktivitas','nama')->get();
            $pemicu = Pemicu::select('id_pemicu','nama')->get();
            $komplikasi = Komplikasi::select('id_komplikasi','nama')->get();

            $data = [
                'title' => 'Edit Aktivitas | StrokeCare',
                'aktivitas' => $aktivitas,
                'kat_aktivitas' => $kat_aktivitas,
                'pemicu' => $pemicu,
                'komplikasi' => $komplikasi,
            ];

            return view('auth.admin.aktivitas.edit_aktivitas', $data);
        }

        // Penanganan
        public function admin_penanganan() {
            $penanganan = Penanganan::with('pemicu','komplikasi','kategori_penanganan')->get();

            $data = [
                'title' => 'Penanganan Admin | StrokeCare',
                'penanganan' => $penanganan,
            ];

            return view('auth.admin.penanganan.index', $data);
        }
        public function admin_tambah_penanganan() {
            $kat_penanganan = Kategori_penanganan::select('id_kat_penanganan','nama')->get();
            $pemicu = Pemicu::select('id_pemicu','nama')->get();
            $komplikasi = Komplikasi::select('id_komplikasi','nama')->get();

            $data = [
                'title' => 'Tambah penanganan | StrokeCare',
                'kat_penanganan' => $kat_penanganan,
                'pemicu' => $pemicu,
                'komplikasi' => $komplikasi,
            ];

            return view('auth.admin.penanganan.penanganan', $data);
        }
        public function admin_tambah_kategori_penanganan() {
            $data = [
                'title' => 'Tambah Kategori Penanganan | StrokeCare',
            ];

            return view('auth.admin.penanganan.kategori_penanganan', $data);
        }
        public function admin_edit_penanganan($id) {
            $penanganan = Penanganan::where('id_penanganan', $id)->first();

            $kat_penanganan = Kategori_penanganan::select('id_kat_penanganan','nama')->get();
            $pemicu = Pemicu::select('id_pemicu','nama')->get();
            $komplikasi = Komplikasi::select('id_komplikasi','nama')->get();

            $data = [
                'title' => 'Edit Penanganan | StrokeCare',
                'penanganan' => $penanganan,
                'kat_penanganan' => $kat_penanganan,
                'pemicu' => $pemicu,
                'komplikasi' => $komplikasi,
            ];

            return view('auth.admin.penanganan.edit_penanganan', $data);
        }
    // End Admin
}
