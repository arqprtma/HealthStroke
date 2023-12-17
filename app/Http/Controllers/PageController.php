<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Artikel;
use App\Models\Kategori_aktivitas;
use App\Models\Kategori_artikel;
use App\Models\Kategori_penanganan;
use App\Models\Komplikasi;
use App\Models\Pasien;
use App\Models\Pemicu;
use App\Models\Penanganan;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Make sure to include this
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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
        // Get the current user's ID
        $userId = Auth::id();

        $pasien = Pasien::with('user')
        ->where('id_user', $userId);

        $pasien = $pasien->get();
        $pasien_aktif = $pasien->where('status', 'aktif')->first();

        // Get Artikel
        $artikel = Artikel::get();

        // Get Kategori Aktivitas
        $kat_aktivitas = Kategori_aktivitas::get();
        $kat_penanganan = Kategori_penanganan::get();

        $treatment = null;
        $aktivitas = null;
        $penanganan = null;
        $aktivitasId = [];
        $penangananId = [];
        $list_aktivitas = [];
        $list_penanganan = [];

        if($pasien_aktif){
            $treatment = Treatment::where('id_pasien', $pasien_aktif->id_pasien)->first();
            $aktivitasId = json_decode($treatment->id_aktivitas);
            $penangananId = json_decode($treatment->id_penanganan);

            // Get Aktivitas Data
            $aktivitas = Aktivitas::with('pemicu','komplikasi','kategori_aktivitas')->whereIn('id_aktivitas', $aktivitasId)->get();
            $penanganan = Penanganan::with('pemicu','komplikasi','kategori_penanganan')->whereIn('id_penanganan', $penangananId)->get();

            // Menggabungkan data Aktivitas berdasarkan kategori aktivitas
            $list_aktivitas = [];
            foreach($kat_aktivitas as $key => $data_kategori){
                foreach ($aktivitas as $jkey => $data_aktivitas) {
                    if($data_kategori->id_kat_aktivitas == $data_aktivitas->id_kat_aktivitas){
                        $list_aktivitas[$data_kategori->id_kat_aktivitas][] = $data_aktivitas; 
                    }
                }
            }
            // Menggabungkan data penanganan berdasarkan kategori penanganan
            $list_penanganan = [];
            foreach($kat_penanganan as $key => $data_kategori){
                foreach ($penanganan as $jkey => $data_penanganan) {
                    if($data_kategori->id_kat_penanganan == $data_penanganan->id_kat_penanganan){
                        $list_penanganan[$data_kategori->id_kat_penanganan][] = $data_penanganan; 
                    }
                }
            }
        }

        $data = [
            'title' => 'Dashboard | StrokeCare',
            'treatment' => $treatment,
            'aktivitas' => $aktivitas,
            'aktivitasId' => $aktivitasId,
            'kat_aktivitas' => $kat_aktivitas,
            'list_aktivitas' => $list_aktivitas,
            'penanganan' => $penanganan,
            'penangananId' => $penangananId,
            'kat_penanganan' => $kat_penanganan,
            'list_penanganan' => $list_penanganan,
            'pasien_aktif' => $pasien_aktif,
            'pasien' => $pasien,
            'artikel' => $artikel
        ];
        // dd($data);
        return view('auth.dashboard', $data);
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

    // Pasien

    public function pasien(Request $request) {
        $pemicu = Pemicu::all();
        $komplikasi = Komplikasi::all();
        $data = [
            'title' => 'Pasien | StrokeCare',
            'pemicu' => $pemicu,
            'komplikasi' => $komplikasi,
        ];
        return view('auth.user.pasien.profile-pasien', $data);
    }

    public function pasien_id(Request $request) {
        $userId = $request->id;
        $pasien = Pasien::where('id', $userId)->get();
        $pemicu = Pemicu::all();
        $komplikasi = Komplikasi::all();
        // dd($pasien);
        $data = [
            'title' => 'Pasien | StrokeCare',
            'pasien' => $pasien,
            'pemicu' => $pemicu,
            'komplikasi' => $komplikasi,
        ];
        return view('auth.user.pasien.profile-pasien', $data);
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
            $users = User::get();
            $pasien = Pasien::get();

            $data = [
                'title' => 'Dashboard Admin | StrokeCare',
                'users' => $users,
                'pasien' => $pasien,
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
        public function admin_artikel() {
            $artikel = Artikel::with('kategori_artikel')->get();
            $data = [
                'title' => 'Artikel Admin | StrokeCare',
                'artikel' => $artikel,
            ];
            
            return view('auth.admin.artikel.index', $data);
        }
        public function admin_tambah_artikel() {
            $kat_artikel = Kategori_artikel::select('id_kat_artikel','nama')->get();

            $data = [
                'title' => 'Tambah penanganan | StrokeCare',
                'kat_artikel' => $kat_artikel,
            ];
            
            return view('auth.admin.artikel.artikel', $data);
        }
        public function admin_edit_artikel($id) {
            $artikel = Artikel::where('id', $id)->first();
    
            $kat_artikel = Kategori_artikel::select('id_kat_artikel','nama')->get();
            
            $data = [
                'title' => 'Edit Artikel | StrokeCare',
                'artikel' => $artikel,
                'kat_artikel' => $kat_artikel,
            ];
            
            return view('auth.admin.artikel.edit_artikel', $data);
        }
        // End Admin
    }
    