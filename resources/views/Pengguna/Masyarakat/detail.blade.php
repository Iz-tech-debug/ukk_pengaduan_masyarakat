<div class="modal fade" id="daffadetail{{ $daffaitem->id_pengaduan }}" tabindex="-1" aria-labelledby="daffadetailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailPengaduanLabel">Detail Pengaduan</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Foto Pengaduan -->
                    <div class="col-md-4">
                        @if ($daffaitem->foto)
                            <img src="{{ asset('storage/' . $daffaitem->foto) }}" class="img-fluid rounded shadow"
                                alt="Foto Pengaduan">
                        @else
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded shadow"
                                alt="Tidak Ada Foto">
                        @endif
                    </div>

                    <!-- Detail Pengaduan -->
                    <div class="col-md-8">
                        <h6><strong>Nama Pengadu:</strong> {{ $daffaitem->masyarakat->nama }}</h6>
                        <p><strong>Tanggal Pengaduan:</strong> {{ $daffaitem->tgl_pengaduan }}</p>
                        <p><strong>Isi Pengaduan:</strong></p>
                        <p>{{ $daffaitem->isi_laporan }}</p>
                        <p
                            class="text-{{ $daffaitem->status == '0' ? 'danger' : ($daffaitem->status == 'proses' ? 'warning' : 'success') }}">
                            <strong>Status:</strong>
                            @if ($daffaitem->status == '0')
                                Belum Diproses
                            @elseif ($daffaitem->status == 'proses')
                                Proses
                            @else
                                Selesai
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
