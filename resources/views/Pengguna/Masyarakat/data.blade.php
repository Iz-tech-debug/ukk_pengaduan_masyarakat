@extends('Pengguna.Masyarakat.mLayout')

@section('title', 'Masyarakat - Data')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @include('Pengguna.Masyarakat.tambah')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#daffatambahpengaduan">
                    <i class="fas fa-plus"></i> Ajukan Pengaduan
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Tanggal</th>
                            <th style="min-width: 300px;">Keterangan</th>
                            <th class="text-center" style="max-width: 100px">Status</th>
                            <th style="max-width: 300px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daffapengaduan as $daffaitem)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $daffaitem->tgl_pengaduan }}</td>
                                <td>{{ $daffaitem->isi_laporan }}</td>
                                <td class="text-center">
                                    @if ($daffaitem->status == '0')
                                        <span class="badge badge-danger">Belum Diproses</span>
                                    @elseif ($daffaitem->status == 'proses')
                                        <span class="badge badge-warning">Diproses</span>
                                    @else
                                        <span class="badge badge-success">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($daffaitem->status != '0')
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#daffatanggapan{{ $daffaitem->id_pengaduan }}">
                                            <i class="fas fa-edit"> Lihat Tanggapan</i>
                                        </button>
                                    @endif
                                    @if ($daffaitem->status != 'proses' && $daffaitem->status != 'selesai')
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#daffadetail{{ $daffaitem->id_pengaduan }}">
                                            <i class="fas fa-eye"> Lihat Detail</i>
                                        </button>
                                    @endif
                                    @if ($daffaitem->status != 'selesai' && $daffaitem->status != 'proses')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#daffahapus{{ $daffaitem->id_pengaduan }}">
                                            <i class="fas fa-trash"> Hapus</i>
                                        </button>
                                    @endif
                                </td>
                            </tr>

                            @include('Pengguna.Masyarakat.detail')
                            @include('Pengguna.Masyarakat.tanggapan')
                            @include('Pengguna.Masyarakat.hapus')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
