@extends('Pengguna.mLayout')

@section('title', ' Log Aktivitas')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Log Aktivitas</h1>
        <p class="mb-4">Berikut adalah log aktivitas yang pernah dilakukan oleh petugas.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Log Aktivitas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daffaaktivitas as $daffaitem)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $daffaitem->petugas->nama_petugas }}</td>
                                    <td>{{ $daffaitem->keterangan }}</td>
                                    <td>{{ $daffaitem->created_at->format('d-m-Y H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
