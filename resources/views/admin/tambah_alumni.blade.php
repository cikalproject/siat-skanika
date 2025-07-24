@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Gagal Menyimpan Data! Data duplikat atau format salah!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
<div class="container">
    <h3 class="mb-4">Tambah Data Alumni (Upload Excel)</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('alumni.importExcel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Upload File Excel</label>
            <input type="file" name="file" class="form-control" accept=".xls,.xlsx" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload & Simpan</button>
        <a href="/dashboard-admin" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
