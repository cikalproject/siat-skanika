<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAT-SKANIKA</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #3b82f6, #1e40af);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body>
    <div class="card col-md-4">
        <img src="{{ asset('img/smkalamnaniyah.png') }}" alt="Logo Sekolah" class="d-block mx-auto mb-3"
            style="width: 70px;">
        <h4 class="text-center fw-bold">SMK Al-Amnaniyah Karangjati</h4>
        <p class="text-center mb-4">Sistem Pendataan Alumni</p>

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <div class="mb-3">
                <label>Login Sebagai</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="alumni">Alumni</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
    </div>
</body>

</html>
