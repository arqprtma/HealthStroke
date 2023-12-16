<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Artikel;
use App\Models\Kategori_aktivitas;
use App\Models\Kategori_penanganan;
use App\Models\Komplikasi;
use App\Models\Pemicu;
use App\Models\Penanganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function store_pemicu(Request $request) {
        try {
            Pemicu::create([
                'nama' => $request->pemicu
            ]);
        
            // Eksekusi jika pembuatan berhasil
            return redirect()->route('admin.pemicu')->with('success', 'Berhasil menyimpan pemicu '.$request->pemicu);
        } catch (\Exception $e) {
            // Eksekusi jika terjadi kesalahan
            return redirect()->route('admin.pemicu')->with('error', 'Gagal menyimpan pemicu '.$request->pemicu);
        }
        
    }
    public function destroy_pemicu($id){
        $pemicu = Pemicu::select('id_pemicu','nama')->where('id_pemicu', $id)->first();

        if ($pemicu) {
            try {
                Pemicu::where('id_pemicu', $id)->delete();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.pemicu')->with('success', 'Berhasil menghapus pemicu '.$pemicu->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.pemicu')->with('error', 'Gagal menghapus pemicu '.$pemicu->nama);
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.pemicu')->with('error', 'Data pemicu tidak ditemukan');
        }
    }
    public function update_pemicu(Request $request, $id) {
        
        $pemicu = Pemicu::select('id_pemicu','nama')->where('id_pemicu', $id)->first();

        $request->validate([
            'nama' => 'required|string|max:100',
        ],[
            'nama.required' => 'Kolom nama wajib diisi.',
        ]);

        if ($pemicu) {
            try {
                $data = Pemicu::findOrFail($id);
                $data->nama = $request->nama;
                $data->save();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.pemicu')->with('success', 'Berhasil merubah pemicu '.$pemicu->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.pemicu')->with('error', $e->getMessage());
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.pemicu')->with('error', 'Data pemicu tidak ditemukan');
        }
    }
    public function store_komplikasi(Request $request) {
        try {
            Komplikasi::create([
                'nama' => $request->komplikasi
            ]);
        
            // Eksekusi jika pembuatan berhasil
            return redirect()->route('admin.komplikasi')->with('success', 'Berhasil menyimpan komplikasi '.$request->komplikasi);
        } catch (\Exception $e) {
            // Eksekusi jika terjadi kesalahan
            return redirect()->route('admin.komplikasi')->with('error', 'Gagal menyimpan komplikasi '.$request->komplikasi);
        }
        
    }
    public function destroy_komplikasi($id){
        $komplikasi = komplikasi::select('id_komplikasi','nama')->where('id_komplikasi', $id)->first();

        if ($komplikasi) {
            try {
                Komplikasi::where('id_komplikasi', $id)->delete();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.komplikasi')->with('success', 'Berhasil menghapus komplikasi '.$komplikasi->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.komplikasi')->with('error', 'Gagal menghapus komplikasi '.$komplikasi->nama);
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.komplikasi')->with('error', 'Data komplikasi tidak ditemukan');
        }
    }
    public function update_komplikasi(Request $request, $id) {
        
        $komplikasi = Komplikasi::select('id_komplikasi','nama')->where('id_komplikasi', $id)->first();

        $request->validate([
            'nama' => 'required|string|max:100',
        ],[
            'nama.required' => 'Kolom nama wajib diisi.',
        ]);

        if ($komplikasi) {
            try {
                $data = Komplikasi::findOrFail($id);
                $data->nama = $request->nama;
                $data->save();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.komplikasi')->with('success', 'Berhasil merubah komplikasi '.$komplikasi->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.komplikasi')->with('error', 'Gagal merubah komplikasi '.$komplikasi->nama);
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.komplikasi')->with('error', 'Data komplikasi tidak ditemukan');
        }
    }
    public function admin_store_aktivitas(Request $request){
        // Validasi request
        $validation = Validator::make($request->all(),[
            'deskripsi' => 'required',
        ],[
            'deskripsi.required' => 'Kolom deskripsi wajib diisi.',
        ]);

        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $data = [
            'id_pemicu' => $request->pemicu,
            'id_komplikasi' => $request->komplikasi,
            'id_kat_aktivitas' => $request->aktivitas,
            'deskripsi' => $request->deskripsi,
            'video' => $request->link_video
        ];

        Aktivitas::create($data);

        return redirect()->route('admin.aktivitas')->with('success', 'Berhasil menambahkan aktivitas');
        // dd($request->all());

        // dd($request->all());

        // // Menyimpan deskripsi ke database
        // $deskripsi = $request->deskripsi;

        // // Proses input gambar dari TinyMCE
        // $imageDataUrl = $request->input('image_data_url');
        // $coba = $request->input('coba');
        // preg_match('/<img src="([^"]+)"/', $imageDataUrl, $matches);
        // $imageUrl = $matches[1] ?? null;

        // // Mendapatkan nama file dari URL gambar
        // $imagePath = parse_url($imageUrl, PHP_URL_PATH);
        // $imageName = time() . '_' . pathinfo($imagePath, PATHINFO_BASENAME);

        // // Menyimpan file gambar ke direktori storage
        // // Storage::put('public/images/' . $imageName, file_get_contents($imageUrl));

        // // // Mendapatkan URL untuk file gambar yang disimpan
        // // $imageUrl = Storage::url('public/images/' . $imageName);

        // // $imageFile = $this->saveImageFromDataUrl($imageDataUrl);
        // dd($deskripsi, $imageName, $imageUrl, $coba);
    }
    public function admin_store_kategori_aktivitas(Request $request){
        $validation = Validator::make($request->all(),[
            'aktivitas' => 'required|string|max:100',
        ],[
            'aktivitas.required' => 'Kolom aktivitas wajib diisi.',
        ]);
        
        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }

        Kategori_aktivitas::create(['nama' => $request->aktivitas]);

        return redirect()->route('admin.aktivitas.kategori.tambah')->with('success', 'Berhasil menambah data kategori aktivitas');
    }
    public function destroy_aktivitas($id){
        $aktivitas = Aktivitas::with('kategori_aktivitas')->where('id_aktivitas', $id)->first();

        if ($aktivitas) {
            try {
                Aktivitas::where('id_aktivitas', $id)->delete();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.aktivitas')->with('success', 'Berhasil menghapus aktivitas '.$aktivitas->kategori_aktivitas->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.aktivitas')->with('error', 'Gagal menghapus aktivitas '.$aktivitas->kategori_aktivitas->nama);
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.aktivitas')->with('error', 'Data aktivitas tidak ditemukan');
        }
    }
    public function update_aktivitas(Request $request, $id) {
        $validation = Validator::make($request->all(),[
            'deskripsi' => 'required',
        ],[
            'deskripsi.required' => 'Kolom deskripsi wajib diisi.',
        ]);
        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $aktivitas = Aktivitas::with('kategori_aktivitas')->where('id_aktivitas', $id)->first();

        if ($aktivitas) {
            try {
                $data = Aktivitas::findOrFail($id);
                $data->id_pemicu = $request->pemicu;
                $data->id_komplikasi = $request->komplikasi;
                $data->id_kat_aktivitas = $request->aktivitas;
                $data->deskripsi = $request->deskripsi;
                $data->video = $request->link_video;
                $data->save();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.aktivitas')->with('success', 'Berhasil merubah aktivitas '.$aktivitas->kategori_aktivitas->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.aktivitas')->with('error', $e->getMessage());
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.aktivitas')->with('error', 'Data aktivitas tidak ditemukan');
        }
    }

    // Penanganan
    public function admin_store_penanganan(Request $request){
        // Validasi request
        $validation = Validator::make($request->all(),[
            'deskripsi' => 'required',
        ],[
            'deskripsi.required' => 'Kolom deskripsi wajib diisi.',
        ]);

        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $data = [
            'id_pemicu' => $request->pemicu,
            'id_komplikasi' => $request->komplikasi,
            'id_kat_penanganan' => $request->penanganan,
            'deskripsi' => $request->deskripsi,
            'video' => $request->link_video
        ];

        Penanganan::create($data);

        return redirect()->route('admin.penanganan')->with('success', 'Berhasil menambahkan penanganan');
    }
    public function admin_store_kategori_penanganan(Request $request){
        $validation = Validator::make($request->all(),[
            'penanganan' => 'required|string|max:100',
        ],[
            'penanganan.required' => 'Kolom penanganan wajib diisi.',
        ]);
        
        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }

        Kategori_penanganan::create(['nama' => $request->penanganan]);

        return redirect()->route('admin.penanganan.kategori.tambah')->with('success', 'Berhasil menambah data kategori penanganan');
    }
    public function destroy_penanganan($id){
        $penanganan = Penanganan::with('kategori_penanganan')->where('id_penanganan', $id)->first();

        if ($penanganan) {
            try {
                Penanganan::where('id_penanganan', $id)->delete();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.penanganan')->with('success', 'Berhasil menghapus penanganan '.$penanganan->kategori_penanganan->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.penanganan')->with('error', 'Gagal menghapus penanganan '.$penanganan->kategori_penanganan->nama);
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.penanganan')->with('error', 'Data penanganan tidak ditemukan');
        }
    }
    public function update_penanganan(Request $request, $id) {
        $validation = Validator::make($request->all(),[
            'deskripsi' => 'required',
        ],[
            'deskripsi.required' => 'Kolom deskripsi wajib diisi.',
        ]);
        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $penanganan = Penanganan::with('kategori_penanganan')->where('id_penanganan', $id)->first();

        if ($penanganan) {
            try {
                $data = Penanganan::findOrFail($id);
                $data->id_pemicu = $request->pemicu;
                $data->id_komplikasi = $request->komplikasi;
                $data->id_kat_penanganan = $request->penanganan;
                $data->deskripsi = $request->deskripsi;
                $data->video = $request->link_video;
                $data->save();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.penanganan')->with('success', 'Berhasil merubah penanganan '.$penanganan->kategori_penanganan->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.penanganan')->with('error', $e->getMessage());
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.penanganan')->with('error', 'Data penanganan tidak ditemukan');
        }
    }
    public function admin_store_artikel(Request $request){
        // Validasi request
        $validation = Validator::make($request->all(),[
            'fileInput' => 'file|mimes:jpeg,png|max:2048'
        ],[
            'fileInput.mimes' => 'Kolom File hanya bisa untuk jpeg dan png wajib diisi.',
        ]);

        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }

        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');
            // Enkripsi nama file
            $encryptedFileName = Crypt::encryptString($file->getClientOriginalName());
            // $decryptedFileName = Crypt::decryptString($uploadedFile->filename); //Cara nampilin file     
            // $imageUrl = asset(Storage::url("public/artikel/cover/{$decryptedFileName}")); //untuk nampilin image
    
            // Simpan file ke direktori yang diinginkan
            $file->storeAs('public/artikel/cover', $encryptedFileName);
            $data = [
                'judul' => $request->judul,
                'cover' => $encryptedFileName,
                'kategori' => $request->kat_artikel,
                'deskripsi' => $request->deskripsi
            ];
        }else{
            $data = [
                'judul' => $request->judul,
                'kategori' => $request->kat_artikel,
                'id_kat_artikr' => $request->artikr,
                'deskripsi' => $request->deskripsi
            ];
        }


        Artikel::create($data);

        return redirect()->route('admin.artikel')->with('success', 'Berhasil menambahkan artikel');
    }

    public function update_artikel(Request $request, $id) {
        // Validasi request
        $validation = Validator::make($request->all(),[
            'fileInput' => 'mimes:jpeg,png,jpg'
        ],[
            'fileInput.mimes' => 'Kolom File hanya bisa untuk jpg, jpeg dan png wajib diisi.',
        ]);
        
        if ($validation->fails()) {
            // Handle kesalahan validasi
            return redirect()->back()->withErrors($validation)->withInput();
        }
    
        $artikel = Artikel::where('id', $id)->first();

        if($artikel){
            if ($request->hasFile('fileInput')) {
                $file = $request->file('fileInput');
                // Enkripsi nama file
                $encryptedFileName = Crypt::encryptString($file->getClientOriginalName());
                // $decryptedFileName = Crypt::decryptString($uploadedFile->filename); //Cara nampilin file     
                // $imageUrl = asset(Storage::url("public/artikel/cover/{$decryptedFileName}")); //untuk nampilin image
        
                // Simpan file ke direktori yang diinginkan
                $file->storeAs('public/artikel/cover', $encryptedFileName);

                try {
                    $data = Artikel::findOrFail($id);
                    $data->judul = $request->judul;
                    $data->cover = $encryptedFileName;
                    $data->kategori = $request->kat_artikel;
                    $data->deskripsi = $request->deskripsi;
                    $data->save();

                    // Eksekusi jika penghapusan berhasil
                    return redirect()->route('admin.artikel')->with('success', 'Berhasil merubah Artikel '.$artikel->nama);
                } catch (\Exception $e) {
                    // Eksekusi jika terjadi kesalahan
                    return redirect()->route('admin.artikel')->with('error', $e->getMessage());
                }
            }else{
                try {
                    $data = Artikel::findOrFail($id);
                    $data->judul = $request->judul;
                    $data->kategori = $request->kat_artikel;
                    $data->deskripsi = $request->deskripsi;
                    $data->save();
                    return redirect()->route('admin.artikel')->with('success', 'Berhasil merubah Artikel '.$artikel->kategori_artikel->nama);
                } catch (\Exception $e) {
                    // Eksekusi jika terjadi kesalahan
                    return redirect()->route('admin.artikel')->with('error', $e->getMessage());
                }
            }
        }
    }

    public function destroy_artikel($id){
        $artikel = Artikel::where('id', $id)->first();

        if ($artikel) {
            try {
                Artikel::where('id', $id)->delete();
                
                // Eksekusi jika penghapusan berhasil
                return redirect()->route('admin.artikel')->with('success', 'Berhasil menghapus artikel '.$artikel->nama);
            } catch (\Exception $e) {
                // Eksekusi jika terjadi kesalahan
                return redirect()->route('admin.artikel')->with('error', 'Gagal menghapus artikel '.$artikel->nama);
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.artikel')->with('error', 'Data artikel tidak ditemukan');
        }
    }
}
