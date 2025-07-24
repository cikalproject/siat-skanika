@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Alumni</h2>

    <form action="{{ route('alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ $alumni->nama }}" required>
                </div>
                <div class="mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $alumni->tempat_lahir }}"
                        required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $alumni->tanggal_lahir }}"
                        required>
                </div>
                <div class="mb-3">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="{{ $alumni->no_telepon }}">
                </div>
                <div class="mb-3">
                    <label>Nama Orang Tua</label>
                    <input type="text" name="nama_ortu" class="form-control" value="{{ $alumni->nama_ortu }}">
                </div>
                <div class="mb-3">
                    <label>Pekerjaan Orang Tua</label>
                    <input type="text" name="pekerjaan_ortu" class="form-control" value="{{ $alumni->pekerjaan_ortu }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control">{{ $alumni->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Nomor Induk Siswa</label>
                    <input type="text" name="nomor_induk" class="form-control" value="{{ $alumni->nomor_induk }}">
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $alumni->username }}">
                </div>
                <div class="mb-3">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" class="form-control" id="jurusan">
                        @php
                        $daftarJurusan = ['Teknik Komputer dan Jaringan', 'Teknik Kendaraan Ringan', 'Tata Busana'];
                        @endphp

                        @foreach ($daftarJurusan as $jrs)
                        <option value="{{ $jrs }}" {{ $alumni->jurusan == $jrs ? 'selected' : '' }}>
                            {{ $jrs }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tahun Lulus</label>
                    <input type="number" name="tahun_lulus" class="form-control" value="{{ $alumni->tahun_lulus }}">
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="Belum Bekerja" {{ $alumni->status == 'Belum Bekerja' ? 'selected' : '' }}>Belum
                            Bekerja</option>
                        <option value="Bekerja" {{ $alumni->status == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                        <option value="Wirausaha" {{ $alumni->status == 'Wirausaha' ? 'selected' : '' }}>Wirausaha
                        </option>
                        <option value="Kuliah" {{ $alumni->status == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control"
                        value="{{ $alumni->nama_perusahaan }}">
                </div>
                <div class="mb-3">
                    <label>Tahun Mulai Bekerja</label>
                    <input type="number" name="tahun_bekerja" class="form-control" value="{{ $alumni->tahun_bekerja }}">
                </div>
                <div class="mb-3">
                    <label>Informasi Tambahan</label>
                    <textarea name="informasi_pekerjaan"
                        class="form-control">{{ $alumni->informasi_pekerjaan }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="/dashboard-admin" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
