@extends('Pengguna.mLayout')

@section('title', 'Admin')

@section('content')
    @include('Modal.Petugas.tambah')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Petugas</h1>
    <p class="mb-4">Semua data petugas yang ada didalam <i>Database</i></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Petugas</h5>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#daffatambahpetugas">Tambah Petugas</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="daffatabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Pengguna</th>
                            <th>Telepon</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daffapetugas as $daffaitem)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $daffaitem->nama_petugas }}</td>
                                <td>{{ $daffaitem->username }}</td>
                                <td>{{ $daffaitem->telp }}</td>
                                <td style="color:{{ $daffaitem->level == 'admin' ? 'blue' : 'green' }}">
                                    {{ $daffaitem->level }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm btn-circle" data-toggle="modal"
                                        data-target="#ubahpetugas{{ $daffaitem->id_petugas }}">
                                        <i class="fas fa-edit"></i>
                                    </button> |
                                    <button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                        data-target="#hapuspetugas{{ $daffaitem->id_petugas }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('Modal.Petugas.ubah')
                            @include('Modal.Petugas.hapus')
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
