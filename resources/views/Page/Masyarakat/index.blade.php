@extends('Pengguna.mLayout')

@section('title', 'Admin')

@section('content')
    @include('Modal.Masyarakat.tambah')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna atau Masyarakat</h1>
    <p class="mb-4">Semua data pengguna yang ada didalam <i>Database</i></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Pengguna</h5>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                    data-target="#daffatambahmasyarakat">Tambah Akun Pengguna</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  id="daffatabel">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Nama Pengguna</th>
                            <th>Telepon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daffamasyarakat as $daffaitem)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $daffaitem->nik }}</td>
                                <td>{{ $daffaitem->nama }}</td>
                                <td>{{ $daffaitem->username }}</td>
                                <td>{{ $daffaitem->telp }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm btn-circle" data-toggle="modal"
                                        data-target="#daffaubahmasyarakat{{ $daffaitem->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button> |
                                    <button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                        data-target="#daffahapusmasyarakat{{ $daffaitem->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('Modal.Masyarakat.ubah')
                            @include('Modal.Masyarakat.hapus')
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
