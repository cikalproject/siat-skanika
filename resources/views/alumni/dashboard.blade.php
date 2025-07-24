@extends('layouts.app')

@section('content')
<div class="container mt-4">
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Alumni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Dashboard Alumni</h2>

    <table class="table table-striped">
        <tr><th>Nama</th><td>{{ $alumni->nama }}</td></tr>
        <tr><th>Tempat Lahir</th><td>{{ $alumni->tempat_lahir }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ $alumni->tanggal_lahir }}</td></tr>
        <tr><th>No Telepon</th><td>{{ $alumni->no_telepon }}</td></tr>
        <tr><th>Nama Orang Tua</th><td>{{ $alumni->nama_ortu }}</td></tr>
        <tr><th>Pekerjaan Orang Tua</th><td>{{ $alumni->pekerjaan_ortu }}</td></tr>
        <tr><th>Alamat</th><td>{{ $alumni->alamat }}</td></tr>
        <tr><th>Username</th><td>{{ $alumni->username }}</td></tr>
        <tr><th>Nomor Induk</th><td>{{ $alumni->nomor_induk }}</td></tr>
        <tr><th>Jurusan</th><td>{{ $alumni->jurusan }}</td></tr>
        <tr><th>Tahun Lulus</th><td>{{ $alumni->tahun_lulus }}</td></tr>
        <tr><th>Status</th><td>{{ $alumni->status }}</td></tr>
        <tr><th>Nama Perusahaan</th><td>{{ $alumni->nama_perusahaan }}</td></tr>
        <tr><th>Tahun Bekerja</th><td>{{ $alumni->tahun_bekerja }}</td></tr>
        <tr><th>Informasi Pekerjaan</th><td>{{ $alumni->informasi_pekerjaan }}</td></tr>
    </table>
</div>
</body>
</html>

</div>
@endsection
