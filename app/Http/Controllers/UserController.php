<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            return redirect()->route('dashboard');
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
}
