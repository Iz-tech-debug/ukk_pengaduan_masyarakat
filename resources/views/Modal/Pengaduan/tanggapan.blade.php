<div class="modal fade" id="daffatanggapan{{ $daffaitem->id_pengaduan }}" tabindex="-1"
    aria-labelledby="daffatanggapanLabel" aria-hidden="true">
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
                @if ($daffaitem->status != 'proses')
                    <form action="/tanggapi" method="POST">
                        @csrf
                        <input type="hidden" name="daffaid_pengaduan" value="{{ $daffaitem->id_pengaduan }}">
                        <input type="hidden" name="daffaid_petugas" value="{{ session('daffaid') }}">
                        <hr>
                        <div class="form-group">
                            <label for="daffatanggapan">Tanggapan</label>
                            <textarea name="daffatanggapan" id="daffatanggapan" class="form-control" rows="4"
                                placeholder="Masukkan tanggapan Anda..." required></textarea>
                        </div>
                        <div class="form-group mt-3 text-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
