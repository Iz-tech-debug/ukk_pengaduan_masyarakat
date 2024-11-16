<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        .hero {
            background: url('{{ asset('img/logo-ar.png') }}') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero h1 {
            font-size: 3.5rem;
        }

        .features {
            padding: 50px 0;
        }

        .feature-item {
            text-align: center;
            padding: 20px;
        }

        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header class="bg-light sticky-top ">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #FADFA1">
            <div class="container">
                <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#fitur">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tentang">Tentang Kami</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary text-white px-3" href="/login">Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-warning px-3 ms-2" href="/registrasi">Daftar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero">
        <div class="text-center">
            <h1>Laporkan Masalah Anda</h1>
            <p class="lead">Sistem Pengaduan Masyarakat untuk menyuarakan aspirasi dan keluhan Anda dengan mudah dan
                cepat.</p>
            <a href="/registrasi" class="btn btn-primary btn-lg">Mulai Sekarang</a>
        </div>
    </div>

    <section class="features" id="fitur">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Fitur Utama</h2>
                <p class="text-muted">Berikut adalah fitur-fitur utama yang tersedia dalam aplikasi kami.</p>
            </div>
            <div class="row">
                <div class="col-md-4 feature-item">
                    <i class="bi bi-pencil-square display-4 text-primary"></i>
                    <h4 class="mt-3">Pengaduan Online</h4>
                    <p>Laporkan keluhan Anda kapan saja dan di mana saja.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="bi bi-bar-chart-line display-4 text-success"></i>
                    <h4 class="mt-3">Pantau Progres</h4>
                    <p>Melacak status dan perkembangan pengaduan Anda dengan mudah.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <i class="bi bi-people display-4 text-info"></i>
                    <h4 class="mt-3">Kolaborasi Masyarakat</h4>
                    <p>Berikan dukungan atau diskusikan solusi bersama masyarakat lain.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="bg-light py-5">
        <div class="container">
            <div class="text-center">
                <h2>Tentang Kami</h2>
                <p class="text-muted">Aplikasi pengaduan masyarakat yang memberikan kemudahan dalam menyampaikan
                    aspirasi untuk perubahan yang lebih baik.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <p>&copy; 2024 Pengaduan Masyarakat. Semua Hak Dilindungi. | <a href="#">Kebijakan Privasi</a></p>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
