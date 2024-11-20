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
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
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
                            <a class="nav-link" href="/data_pengaduan">Pengaduan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/logout">{{ session('daffanama') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero">
        <div class="container mt-5 mb-5">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Foto</th>
                        <th>NIK</th>
                        <th style="min-width: 300px">Isi Laporan</th>
                        <th>Tanggal Pengaduan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daffapengaduan as $daffaitem)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $daffaitem->foto) }}" alt="foto" width="100">
                            </td>
                            <td>{{ $daffaitem->nik }}</td>
                            <td>{{ $daffaitem->isi_laporan }}</td>
                            <td>{{ $daffaitem->created_at->format('d-m-Y H:i') }}</td>
                            <td class="text-center">
                                @if ($daffaitem->status == 'proses')
                                    <span class="badge rounded-pill bg-warning text-dark">Dalam Proses</span>
                                @elseif ($daffaitem->status == 'selesai')
                                    <span class="badge rounded-pill bg-success">Selesai</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <footer>
        <div class="container text-center">
            <p>&copy; 2024 Pengaduan Masyarakat. Semua Hak Dilindungi. | <a href="#">Kebijakan Privasi</a></p>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="daffapengaduan" tabindex="-1" aria-labelledby="daffapengaduanLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('masyarakatngadu') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="daffapengaduanLabel">Ajukan Pengaduan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="daffanik">NIK</label>
                            <input type="number" class="form-control" id="daffanik" name="daffanik"
                                value="{{ session('daffanik') }}" readonly>
                            @error('daffanik')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="daffaktr">Keterangan</label>
                            <textarea class="form-control" id="daffaktr" name="daffaktr" rows="3">{{ old('daffaktr') }}</textarea>
                            @error('daffaktr')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="daffafoto">Bukti Foto</label>
                            <input type="file" class="form-control" id="daffafoto" name="daffafoto">
                            @error('daffafoto')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
