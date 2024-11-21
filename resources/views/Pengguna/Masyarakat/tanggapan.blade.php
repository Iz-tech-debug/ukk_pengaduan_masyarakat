@foreach ($daffapengaduan as $daffaitem)
<div class="modal fade" id="daffatanggapan{{ $daffaitem->id_pengaduan }}" tabindex="-1" aria-labelledby="daffatanggapanLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="daffatanggapanLabel">Tanggapan Petugas</h5>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Foto Tanggapan -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/' . $daffaitem->foto) }}" alt="Foto Bukti"
                            class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                        <p class="mt-2 text-muted">Foto Bukti</p>
                    </div>

                    <!-- Detail Tanggapan -->
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>NIK: </strong> {{ $daffaitem->nik }}
                            </li>
                            <li class="list-group-item">
                                <strong>Judul Pengaduan: </strong> {{ $daffaitem->judul }}
                            </li>
                            <li class="list-group-item">
                                <strong>Tanggal Pengaduan: </strong> {{ $daffaitem->created_at->format('d M Y') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Status: </strong>
                                <span class="badge {{ $daffaitem->status == 'proses' ? 'bg-warning text-white' : 'bg-success text-white' }}">
                                    {{ ucfirst($daffaitem->status) }}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>Tanggapan Petugas: </strong>
                                @if ($daffaitem->tanggapan)
                                    {{ $daffaitem->tanggapan->tanggapan }}
                                @else
                                    <span class="text-danger">Belum ada tanggapan.</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
