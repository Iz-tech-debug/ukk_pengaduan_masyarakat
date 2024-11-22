<div class="modal fade" id="daffatambahpengaduan" tabindex="-1" aria-labelledby="tambahPengaduanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPengaduanLabel">Tambah Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/masyarakatngadu" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="daffanik">NIK</label>
                        <input type="number" class="form-control" id="daffanik" name="daffanik" value="{{ session('daffanik') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="daffaktr">Isi Laporan</label>
                        <textarea class="form-control" id="daffaktr" name="daffaktr" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="daffafoto">Foto</label>
                        <input type="file" class="form-control-file" id="daffafoto" name="daffafoto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
                </div>
            </form>
        </div>
    </div>
</div>
