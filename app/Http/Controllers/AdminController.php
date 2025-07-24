<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $totalAlumni = Alumni::count();
        $alumniBekerja = Alumni::where('status', 'Bekerja')->count();
        $jumlahJurusan = Alumni::distinct('jurusan')->count('jurusan');
        $alumnis = Alumni::all();

        return view('admin.dashboard-admin', compact('totalAlumni', 'alumniBekerja', 'jumlahJurusan', 'alumnis'));
    }

    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.show-alumni', compact('alumni'));
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.edit-alumni', compact('alumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'status' => 'required',
        ]);

        $alumni = Alumni::findOrFail($id);
        $alumni->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Data alumni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Alumni::destroy($id);
        return redirect()->route('admin.dashboard')->with('success', 'Data alumni berhasil dihapus.');
    }

    public function dashboard()
    {
        $totalAlumni = Alumni::count();
        $alumniBekerja = Alumni::where('status', 'Bekerja')->count();
        $jumlahJurusan = Alumni::distinct('jurusan')->count('jurusan');
        $alumnis = Alumni::all();

        return view('admin.dashboard-admin', compact('totalAlumni', 'alumniBekerja', 'jumlahJurusan', 'alumnis'));
    }
}
