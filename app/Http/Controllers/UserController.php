<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Aktivitas;
use App\Models\Log_treatment;
use App\Models\Penanganan;
use App\Models\Treatment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;


class UserController extends Controller
{
    public function register(Request $request) {
        $validation = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users,email', // Add unique rule here
            'gender' => 'required',
            'umur' => 'required',
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:8',
        ], [
            'nama.required' => 'Kolom nama wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.', // Customize unique rule message
            'gender.required' => 'Kolom gender wajib diisi.',
            'umur.required' => 'Kolom umur wajib diisi.',
            'username.required' => 'Kolom username wajib diisi.',
            'password.required' => 'Kolom password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data_request = [
            'nama' => $request->nama,
            'email' => $request->email,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ];

       $user = User::create($data_request);

       event(new Registered($user));

       Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function login(Request $request) {
        // $validation = Validator::make($request->all(),[
        //     'username' => 'required|string|max:50',
        //     'password' => 'required|string|min:8',
        // ],[
        //     'username.required' => 'Kolom username wajib diisi.',
        //     'password.required' => 'Kolom password wajib diisi.',
        //     'password.min' => 'Password minimal harus 8 karakter.',
        // ]);

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = auth()->user();

            if($user->role == 'user'){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('admin.index');
            }
        }

        // $credentials = [
        //     'username' => $request->username,
        //     'password' => bcrypt($request->password)
        // ];

        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('dashboard');
        // }

        return back()->withErrors(['errors' => $credentials])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile(Request $request, $id){

        $validation = Validator::make($request->all(),[
            'nama' => 'required|string|max:100',
            'email' => 'required|string|email|max:100',
            'gender' => 'required',
            'umur' => 'required',
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:8',
        ],[
            'nama.required' => 'Kolom nama wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'gender.required' => 'Kolom gender wajib diisi.',
            'umur.required' => 'Kolom umur wajib diisi.',
            'username.required' => 'Kolom username wajib diisi.',
            'password.required' => 'Kolom password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);
        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput()->with('error', 'Gagal merubah profile');
        }

        $data = User::findOrFail($id);
        $data->nama = $request->nama;
        $data->gender = $request->gender;
        $data->umur = $request->umur;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('profile')->with('success', 'Berhasil merubah profile');


    }

    // Pasien
    public function pasien_store(Request $request) {
        // Validasi input
        $validation = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:100'],
            'gender' => 'required',
            'umur' => 'required|numeric|max:100|min:1',
            'pemicu' => 'required|array|min:1|max:2',
            'pemicu.*' => 'required|string',
            'komplikasi' => 'required|array|min:1',
            'komplikasi.*' => 'required|string',
        ], [
            'nama.required' => 'Kolom nama wajib diisi.',
            'nama.string' => 'Kolom nama harus berupa teks.',
            'nama.max' => 'Kolom nama tidak boleh lebih dari 100 karakter.',
            'gender.required' => 'Kolom gender wajib diisi.',
            'umur.required' => 'Kolom umur wajib diisi.',
            'umur.numeric' => 'Kolom umur harus berupa angka.',
            'umur.max' => 'Umur tidak boleh lebih dari 100 tahun.',
            'umur.min' => 'Umur tidak boleh kurang dari 1 tahun.',
            'pemicu.required' => 'Minimal 1 checkbox pemicu harus dicentang.',
            'pemicu.*.required' => 'Checkbox pemicu harus dicentang.',
            'pemicu.max' => 'Jumlah checkbox pemicu tidak boleh lebih dari 2.',
            'komplikasi.required' => 'Minimal 1 checkbox komplikasi harus dicentang.',
            'komplikasi.*.required' => 'Checkbox komplikasi harus dicentang.',
        ]);

        // Jika validasi gagal
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        // Ambil data pemicu dan komplikasi yang dipilih
        $selectedPemicu = $request->input('pemicu', []);
        $selectedKomplikasi = $request->input('komplikasi', []);

        // Ambil aktivitas berdasarkan pemicu dan komplikasi yang dipilih
        $aktivitas = Aktivitas::whereIn('id_komplikasi', $selectedKomplikasi)
            ->whereIn('id_pemicu', $selectedPemicu)
            ->get();
        $aktivitasId = $aktivitas->pluck('id_aktivitas');
        $penanganan = Penanganan::whereIn('id_komplikasi', $selectedKomplikasi)
            ->whereIn('id_pemicu', $selectedPemicu)
            ->get();
        $penangananId = $penanganan->pluck('id_penanganan');

        // Data untuk request pasien
        $data_request = [
            'nama' => $request->nama,
            'id_user' => $request->id_user,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'pemicu' => $selectedPemicu,
            'komplikasi' => $selectedKomplikasi,
        ];

        // Simpan data pasien
        $pasien = Pasien::create($data_request);
        // Data untuk treatment
        $data_treatment = [
            'id_aktivitas' => $aktivitasId,
            'id_penanganan' => $penangananId,
            'id_pasien' => $pasien->id_pasien,
        ];

        // Simpan data treatment
        Treatment::create($data_treatment);

        return redirect()->route('dashboard')->with('success', 'Berhasil tambah data pasien');
    }


    public function pasien_update(Request $request, $id){

        $validation = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:100'],
            'gender' => 'required',
            'umur' => 'required|numeric|max:100|min:1',
            'pemicu' => 'required|min:1|max:2',
            'komplikasi' => 'required|min:1',
        ], [
            'nama.required' => 'Kolom nama wajib diisi.',
            'nama.string' => 'Kolom nama harus berupa teks.',
            'nama.max' => 'Kolom nama tidak boleh lebih dari 100 karakter.',
            'nama.regex' => 'Kolom nama tidak boleh mengandung angka.',
            'gender.required' => 'Kolom gender wajib diisi.',
            'umur.required' => 'Kolom umur wajib diisi.',
            'umur.numeric' => 'Kolom umur harus berupa angka.',
            'umur.max' => 'Umur tidak boleh lebih dari 100 tahun.',
            'umur.min' => 'Umur tidak boleh kurang dari 1 tahun.',
            'pemicu.required' => 'Minimal 1 checkbox pemicu harus dicentang.',
            'pemicu.*.required' => 'Checkbox pemicu harus dicentang.',
            'pemicu.max' => 'Jumlah checkbox pemicu tidak boleh lebih dari 2.',
            'komplikasi.required' => 'Minimal 1 checkbox komplikasi harus dicentang.',
            'komplikasi.*.required' => 'Checkbox komplikasi harus dicentang.',
        ]);

        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }


        $data = Pasien::findOrFail($id);
        $data->nama = $request->nama;
        $data->id_user = $request->id_user;
        $data->gender = $request->gender;
        $data->umur = $request->umur;
        $data->pemicu = $request->input('pemicu', []);
        $data->komplikasi = $request->input('komplikasi',[]);


        $data->save();

        return redirect()->back()->with('success', 'Berhasil merubah data pasien');

    }

    public function add_log_penanganan(Request $request, $id) {
        $id_user = auth()->user()->id;
        $pasien = Pasien::select('id_pasien')->where('id_user',$id_user)->first();
        $data = [
            'id_pasien' => $pasien->id_pasien,
            'id_penanganan' => $id,
            'id_aktivitas' => null,
        ];
        $data = Log_treatment::create($data);
        return redirect()->route('dashboard');
    }

    public function add_log_aktivitas(Request $request, $id) {
        $id_user = auth()->user()->id;
        $pasien = Pasien::select('id_pasien')->where('id_user',$id_user)->first();
        $data = [
            'id_pasien' => $pasien->id_pasien,
            'id_penanganan' => null,
            'id_aktivitas' => $id,
        ];
        $data = Log_treatment::create($data);
        return redirect()->route('dashboard');
    }

    public function getDataForChart(Request $request)
    {
        // Proses pembuatan Chart log
            // log treatment
            $today = $request->input('start_date');
            $oneweekago = Carbon::parse($today)->subWeek();

            // Konversi ke objek Carbon untuk memanipulasi tanggal
            $startDate = Carbon::parse($today);

            $id_pasien = $request->input('id_pasien');

            $log_treatmentWeek = Log_treatment::where('id_pasien', $id_pasien)
                ->whereBetween('created_at', [$oneweekago, $today])
                ->get()
                ->map(function ($log) { // Membuat Created_at menjadi tahun bulan tanggal, untuk jam akan default 00
                    $log->created_at = Carbon::parse($log->created_at)->format('Y-m-d');
                    return $log;
                })
                ->groupBy('created_at');
                // dd($log_treatmentWeek);

            $groupTreatment = [];
            // $no = 0;
            foreach ($log_treatmentWeek as $key => $time) { // Merubah Index emnjadi angka
                foreach ($time as $data) {
                    $groupTreatment[$key][] = $data;
                }
                // $no++;
            }
            $dataTreatment = [];
            $total_treatment = 0;
            foreach ($groupTreatment as $key => $data) { //Menghitung total data treatment berdasarkan hari
                $dataTreatment[$key] = count($data);
                $total_treatment += count($data);
            }
            // Mendapatkan nama hari untuk satu minggu kebelakang
            $weekDayNames = [];
            $dataValues = [];
            for ($i = 6; $i >= 0; $i--) {
                $weekDayNames[] = $startDate->copy()->subDays($i)->format('l'); // Format 'l' untuk mendapatkan nama hari dalam bahasa Inggris
                $currentDate[] = $startDate->copy()->subDays($i)->format('Y-m-d');
                // $weekDayNames[$currentDate] = isset($weekDayData[$currentDate]) ? $weekDayData[$currentDate] : 0;
                // // $weekDayNames[] = $currentDate; // Simpan tanggal saat ini sebagai label
                // $dataValues[] = isset($dataTreatment[$currentDate]) ? $dataTreatment[$currentDate] : 0;
            }
            $weekDayValues = [];
            foreach ($currentDate as $day) {
                $formattedDate = Carbon::parse($day)->format('Y-m-d H:i:s');
                $weekDayValues[] = isset($dataTreatment[$formattedDate]) ? $dataTreatment[$formattedDate] : 0;
            }
            // dd($weekDayValues->toArray());
        // End Proses

        $data = [
            'weekDayNames' => $weekDayNames,
            'weekDayValues' => $weekDayValues, // [0,0,2,0,0,0,4]
            'total_treatment' => $total_treatment,
        ];

        return response()->json($data);
    }


}
