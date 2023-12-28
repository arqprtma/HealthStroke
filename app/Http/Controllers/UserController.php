<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Aktivitas;
use App\Models\Penanganan;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request) {
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

        User::create($data_request);

        return redirect()->route('login');
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

        return back()->withErrors($credentials)->withInput();
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

        // dd($request->all(),$aktivitas, $penanganan);

        $dataPasien = Pasien::select('id_pasien','status')->where('id_user',auth()->user()->id)->first();

        // Data untuk request pasien
        $data_request = [
            'nama' => $request->nama,
            'id_user' => $request->id_user,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'pemicu' => $selectedPemicu,
            'komplikasi' => $selectedKomplikasi,
        ];
        if(!$dataPasien){
            $data_request['status'] = 'aktif';
        }

        // Simpan data pasien
        $pasien = Pasien::create($data_request);
        // Data untuk treatment
        $data_treatment = [
            'id_aktivitas' => $aktivitasId,
            'id_penanganan' => $penangananId,
            'id_pasien' => $pasien->id,
        ];
        // Simpan data treatment
        Treatment::create($data_treatment);

        return redirect()->route('pasien')->with('success', 'Berhasil tambah data pasien');
    }


    public function pasien_update(Request $request, $id){
        $validation = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:100', 'regex:/^[^\d]+$/'],
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
}
