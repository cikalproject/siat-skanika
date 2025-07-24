<!-- resources/views/admin/detail-alumni.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Detail Data Alumni</h2>

        <hr class="my-1">

        <!-- Informasi Pribadi -->
        <h2 class="text-lg font-semibold mb-4">Data Pribadi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-12 text-gray-700">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="font-medium text-sm mb-1">Nama Lengkap</p>
                    <p class="font-bold"><b>{{ $alumni->nama }}</b></p>

                    <p class="font-medium text-sm mb-1">Tempat, Tanggal Lahir</p>
                    <p class="text-right"><b>{{ $alumni->tempat_lahir }},
                            {{ \Carbon\Carbon::parse($alumni->tanggal_lahir)->translatedFormat('d F Y') }}</b></p>

                    <p class="font-medium text-sm mb-1">No. Telepon</p>
                    <p><b>{{ $alumni->no_telepon }}</b></p>
                </div>
                <div class="col-md-6">
                    <p class="font-medium text-sm mb-1">Alamat</p>
                    <p class="text-right"><b>{{ $alumni->alamat }}</b></p>

                    <p class="font-medium text-sm mb-1">Nama Orang Tua</p>
                    <p><b>{{ $alumni->nama_ortu }}</b></p>

                    <p class="font-medium text-sm mb-1">Pekerjaan Orang Tua</p>
                    <p class="text-right"><b>{{ $alumni->pekerjaan_ortu }}</b></p>
                </div>
            </div>

            <hr class="my-1">

            <!-- Data Siswa -->
            <h2 class="text-lg font-semibold mb-4">Data Siswa</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-12 text-gray-700">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="font-medium text-sm mb-1">Nomor Induk</p>
                        <p class="font-bold"><b>{{ $alumni->nomor_induk }}</b></p>
                    </div>
                    <div>
                        <p class="font-medium text-sm mb-1">Tahun Lulus</p>
                        <p class="text-right"><b>{{ $alumni->tahun_lulus }}</b></p>
                    </div>
                    <div>
                        <p class="font-medium text-sm mb-1">Jurusan</p>
                        <p><b>{{ $alumni->jurusan }}</b></p>
                    </div>
                </div>

                <hr class="my-1">

                <!-- Data Pekerjaan -->
                <h2 class="text-lg font-semibold mb-4">Data Pekerjaan</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-12 text-gray-700">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="font-medium text-sm mb-1">Status</p>
                            <p><b>{{ $alumni->status }}</b></p>

                            <p class="font-medium text-sm mb-1">Tahun Mulai Bekerja</p>
                            <p><b>{{ $alumni->tahun_bekerja }}</b></p>
                        </div>
                        <div class="col-md-6">
                            <p class="font-medium text-sm mb-1">Nama Perusahaan</p>
                            <p class="text-right"><b>{{ $alumni->nama_perusahaan }}</b></p>

                            <p class="font-medium text-sm mb-1">Informasi Pekerjaan</p>
                            <p><b>{{ $alumni->informasi_pekerjaan }}</b></p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-primary me-2">Edit Data</a>
                <a href="{{ route('dashboard-admin') }}" class="btn btn-danger">Kembali</a>
            </div>
            @endsection
