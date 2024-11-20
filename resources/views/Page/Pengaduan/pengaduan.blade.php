@extends('Pengguna.mLayout')

@section('title', 'Pengaduan')

@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengaduan</h1>
    <p class="mb-4">Semua data pengaduan yang ada didalam <i>Database</i></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Pengaduan</h5>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#daffatambahpengaduan">Tambah Pengaduan</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="daffatabel">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
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
                                <td>{{ $daffaitem->nik }}</td>
                                <td>{{ $daffaitem->isi_laporan }}</td>
                                <td>{{ $daffaitem->tgl_pengaduan }}</td>
                                <td class="text-center">
                                    @if ($daffaitem->status == '0')
                                        <span class="badge badge-danger">Belum Diproses</span>
                                    @elseif ($daffaitem->status == 'proses')
                                        <span class="badge badge-warning">Diproses</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success btn-sm btn-circle" data-toggle="modal"
                                        data-target="#daffatanggapan{{ $daffaitem->id_pengaduan }}">
                                        <i class="fas fa-edit"></i>
                                    </button> |
                                    <button type="button" class="btn btn-success btn-sm btn-circle" data-toggle="modal"
                                        data-target="#daffaselesaikan{{ $daffaitem->id_pengaduan }}">
                                        <i class="fas fa-check"></i>
                                    </button> |
                                    <button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                        data-target="#daffahapuspengaduan{{ $daffaitem->id_pengaduan }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('Modal.Pengaduan.tanggapan')
                            @include('Modal.Pengaduan.selesai')
                            @include('Modal.Pengaduan.hapus')
                        @endforeach
                    </tbody>
                </table>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('daffatabel').setAttribute('id', 'dataTable');
                    });
                </script>
            </div>
        </div>
    </div>

@endsection
