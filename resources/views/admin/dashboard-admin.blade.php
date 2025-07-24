@extends('layouts.app') {{-- Buat layout jika belum ada --}}

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif


@section('content')
<div class="container mt-4">
    <h3>Dashboard Admin</h3>
    <div class="card mb-3">
    <img src="{{ asset('img/dashboard.jpg') }}" class="text-center" alt="welcome">
    <div class="card-body">
        <h5 class="card-title">Selamat Datang di Alumni Tracer SMK Al-Amnaniyah Karangjati</h5>
        <p class="card-text">Website ini masih sebatas sebagai pemenuhan syarat tugas akhir penulis, 
        namun ke depannya memiliki potensi untuk dikembangkan 
        lebih lanjut agar memberikan manfaat yang lebih luas.
</p>
        <p class="card-text"><small class="text-muted">Created by Putrawan Hendi Prakosa</small></p>
    </div>
</div>
<div class="row mb-4">
    <!-- Total Alumni -->
    <div class="col-md-4">
        <div class="info-box">
            <div class="info-icon bg-primary">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <div class="text-muted">Total Alumni</div>
                <div class="fs-4 fw-bold">
                    <h2>{{ $totalAlumni }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Alumni Bekerja -->
    <div class="col-md-4">
        <div class="info-box">
            <div class="info-icon bg-success">
                <i class="fas fa-briefcase"></i>
            </div>
            <div>
                <div class="text-muted">Alumni Bekerja</div>
                <div class="fs-4 fw-bold">
                    <h2>{{ $alumniBekerja }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Jurusan -->
    <div class="col-md-4">
        <div class="info-box">
            <div class="info-icon bg-warning">
                <i class="fa-solid fa-building-columns"></i>
            </div>
            <div>
                <div class="text-muted">Jurusan</div>
                <div class="fs-4 fw-bold">
                    <h2>{{ $jumlahJurusan }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Data Alumni</h5>
        <a href="{{ route('alumni.formUpload') }}" class="btn btn-success"><i class="fa-solid fa-user-plus"></i>
            Tambah Alumni</a>
    </div>

    <table id="tabel-alumni" class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jurusan</th>
                <th>Tahun Lulus</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnis as $alumni)
            <tr>
                <td>{{ $alumni->nama }}</td>
                <td>{{ $alumni->nomor_induk }}</td>
                <td>{{ $alumni->jurusan }}</td>
                <td>{{ $alumni->tahun_lulus }}</td>
                <td>
                    @if($alumni->status == 'Bekerja')
                    <span class="badge bg-success">Bekerja</span>
                    @elseif($alumni->status == 'Kuliah')
                    <span class="badge bg-warning text-dark">Kuliah</span>
                    @else
                    <span class="badge bg-secondary">{{ $alumni->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('alumni.show', $alumni->id) }}" class="btn btn-info btn-sm"><i
                            class="fa-solid fa-eye" style="color: #ffffff;"></i></a> |
                    <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-primary btn-sm"><i
                            class="fa-solid fa-pen-to-square"></i></a> |
                    <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="fa-solid fa-eraser"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tabel-alumni').DataTable();
    });

</script>
