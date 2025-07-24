<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Alumni Tracer | SIAT</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tambahkan di <head> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/d240fd1084.js" crossorigin="anonymous"></script>

    <style>
        .info-box {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 1.2rem;
            border-radius: 12px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        }

        .info-icon {
            padding: 12px;
            border-radius: 10px;
            color: white;
            margin-right: 15px;
            font-size: 24px;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light px-4">
        <a class="navbar-brand fw-bold" href="#">SIAT | SMK Al-Amnaniyah Karangjati</a>
        <div>
            <i class="fa-solid fa-user"></i><td> |
            <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </nav>

    @yield('content')
</body>

</html>
