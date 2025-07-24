<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Session;

class AlumniLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-alumni');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nomor_induk' => 'required',
        ]);

        $alumni = Alumni::where('username', $request->username)
                        ->where('nomor_induk', $request->nomor_induk)
                        ->first();

        if ($alumni) {
            session(['alumni_id' => $alumni->id]);
            return redirect()->route('alumni.dashboard');
        } else {
            return back()->with('error', 'Username atau Nomor Induk salah');
        }
    }

    public function dashboard()
    {
        $alumni = Alumni::find(session('alumni_id'));

        if (!$alumni) {
            return redirect()->route('alumni.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('alumni.dashboard', compact('alumni'));
    }

    public function logout()
    {
        session()->forget('alumni_id');
        return redirect()->route('alumni.login')->with('success', 'Berhasil logout');
    }
}
