<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
    $credentials = $request->only('username', 'password', 'role');

    if ($credentials['role'] === 'admin') {
        $user = DB::table('users')
            ->where('username', $credentials['username'])
            ->first();

        if ($user && md5($credentials['password']) === $user->password) {
            Session::put('user', $user);
            return redirect('/dashboard-admin');
        }

    } elseif ($credentials['role'] === 'alumni') {
        $alumni = DB::table('alumnis')
            ->where('username', $credentials['username'])
            ->where('nomor_induk', $credentials['password']) // password = nomor_induk
            ->first();

        if ($alumni) {
            Session::put('alumni', $alumni);
            return redirect('/alumni/dashboard/' . $alumni->id); // Arahkan ke dashboard khusus alumni
        }
    }

    return back()->with('error', 'Username atau Password salah');
}

}
