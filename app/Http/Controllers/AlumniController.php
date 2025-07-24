<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumniImport;
use App\Http\Controllers\AdminController;
use App\Models\Alumni;

class AlumniController extends Controller
{

    public function destroy($id)
{
    try {
        $alumni = \App\Models\Alumni::findOrFail($id);
        $alumni->delete();

        return redirect()->route('dashboard-admin')->with('success', 'Data alumni berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->route('dashboard-admin')->with('error', 'Gagal menghapus data.');
    }
}

    // Menampilkan form edit
public function edit($id)
{
    $alumni = Alumni::findOrFail($id);
    return view('alumni.edit', compact('alumni'));
}

// Menyimpan hasil update

public function update(Request $request, $id)
{
    $alumni = Alumni::findOrFail($id);

    // Simpan data dari form
    $alumni->nama = $request->nama;
    $alumni->tempat_lahir = $request->tempat_lahir;
    $alumni->tanggal_lahir = $request->tanggal_lahir;
    $alumni->no_telepon = $request->no_telepon;
    $alumni->nama_ortu = $request->nama_ortu;
    $alumni->pekerjaan_ortu = $request->pekerjaan_ortu;
    $alumni->alamat = $request->alamat;
    $alumni->username = $request->username;
    $alumni->nomor_induk = $request->nomor_induk;
    $alumni->jurusan = $request->jurusan;
    $alumni->tahun_lulus = $request->tahun_lulus;
    $alumni->status = $request->status;
    $alumni->nama_perusahaan = $request->nama_perusahaan;
    $alumni->tahun_bekerja = $request->tahun_bekerja;
    $alumni->informasi_pekerjaan = $request->informasi_pekerjaan;

    $alumni->save(); // Simpan ke DB

    return redirect()->route('dashboard-admin')->with('success', 'Data berhasil diupdate.');
}


public function formUpload()
{
    return view('admin.tambah_alumni');
}

public function importExcel(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new AlumniImport, $request->file('file'));

    try {
        $import = new AlumniImport();
        Excel::import($import, $request->file('file'));

        if ($import->berhasil > 0) {
            return redirect()->route('dashboard-admin')
                ->with('success', $import->berhasil . ' data alumni berhasil diimport.');
        } else {
            return redirect()->route('dashboard-admin');
        }
        } catch (\Exception $e) {
        return redirect()->route('alumni.formUpload');
    }

    // return redirect()->route('dashboard-admin')->with('success', 'Data alumni berhasil diimpor.');
    // return redirect()->route('dashboard-admin')->with('success', 'Data alumni berhasil diimport.');

}
}
