<?php

namespace App\Http\Controllers;

use App\Models\Komplikasi;
use App\Models\Pemicu;
use Illuminate\Http\Request;

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
    function destroy_pemicu($id){
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
    function update_pemicu(Request $request, $id) {
        
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
    function destroy_komplikasi($id){
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
    function update_komplikasi(Request $request, $id) {
        
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
                return redirect()->route('admin.komplikasi')->with('error', $e->getMessage());
            }
        } else {
            // Objek tidak ditemukan, mungkin hendak menanggapi dengan pesan atau log
            return redirect()->route('admin.komplikasi')->with('error', 'Data komplikasi tidak ditemukan');
        }
    }
}
