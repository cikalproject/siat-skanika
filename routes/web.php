<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Session;


Route::get('/admin/dashboard-admin', [AdminController::class, 'dashboard'])->name('dashboard-admin');


Route::get('/admin/tambah-alumni', [AlumniController::class, 'formUpload'])->name('alumni.formUpload');
Route::post('/admin/import-alumni', [AlumniController::class, 'importExcel'])->name('alumni.importExcel');

Route::get('/dashboard-admin', [AlumniController::class, 'dashboard-admin'])->name('dashboard-admin');
Route::get('/dashboard-admin', [AdminController::class, 'dashboard-admin'])->name('dashboard-admin');

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard');
})->middleware('auth.admin');


Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/alumni/{id}', [AdminController::class, 'show'])->name('alumni.show');
Route::get('/alumni/{id}/edit', [AdminController::class, 'edit'])->name('alumni.edit');
Route::post('/alumni/{id}/update', [AdminController::class, 'update'])->name('alumni.update');
Route::delete('/alumni/{id}/hapus', [AdminController::class, 'destroy'])->name('alumni.destroy');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // arahkan kembali ke halaman login
})->name('logout');

Route::get('/admin/alumni/{id}', [AdminController::class, 'show'])->name('alumni.show');

// Tambahkan route update dengan method PUT
Route::put('/alumni/{id}/update', [AlumniController::class, 'update'])->name('alumni.update');

// use App\Http\Controllers\AuthController;
// use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/alumni/dashboard/{id}', function ($id) {
    $alumni = DB::table('alumnis')->find($id);

    if ($alumni->username !== Session::get('alumni')->username) {
    return redirect('/login')->with('error', 'Akses tidak diizinkan');
}

    if (!$alumni) {
        return redirect('/login')->with('error', 'Data alumni tidak ditemukan');
    }

    return view('alumni.dashboard', compact('alumni'));
})->name('alumni.dashboard');
