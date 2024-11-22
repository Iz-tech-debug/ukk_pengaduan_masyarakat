@extends('Pengguna.mLayout')

@section('title', 'Laporan Pengaduan')

@section('content')

    <div class="container">

        <h1 class="mb-5">Laporan Pengaduan</h1>

        <form method="GET" action="{{ route('laporan_index') }}">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Belum Diproses</option>
                        <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="daffamulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="daffamulai" name="daffamulai"
                        value="{{ request('daffamulai') }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="daffaakhir">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="daffaakhir" name="daffaakhir"
                        value="{{ request('daffaakhir') }}" required>
                </div>
                <div class="form-group col-md-3 align-self-end">
                    @if (request()->has('status') || request()->has('daffamulai') || request()->has('daffaakhir'))
                        <a href="{{ route('laporan_cetak', request()->all()) }}" class="btn btn-success"><i
                                class="fas fa-print"></i> Cetak </a> <small><i class="fas fa-info"> Periode yang
                                dipilih</i></small>
                    @else
                        <button type="submit" class="btn btn-primary">Filter</button>
                    @endif
                </div>
            </div>
        </form>


        <table class="table table-bordered mt-4">

            <thead>
                <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($daffapengaduan as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>{{ $item->isi_laporan }}</td>
                        <td class="text-center">
                            @if ($item->status == '0')
                                <span class="badge bg-danger text-white">Belum Diproses</span>
                            @elseif ($item->status == 'proses')
                                <span class="badge bg-warning text-white">Diproses</span>
                            @else
                                <span class="badge bg-success text-white">Selesai</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data pengaduan ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
