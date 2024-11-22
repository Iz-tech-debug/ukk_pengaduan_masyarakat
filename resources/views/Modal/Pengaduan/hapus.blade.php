<div class="modal fade" id="daffahapuspengaduan{{ $daffaitem->id_pengaduan }}" tabindex="-1"
    aria-labelledby="selesaikanPengaduanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/hapus_pengaduan/{{ $daffaitem->id_pengaduan }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="selesaikanPengaduanLabel">Tolak Pengaduan</h5>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menolak pengaduan ini?</p>
                    <input type="hidden" name="id_pengaduan" value="{{ $daffaitem->id_pengaduan }}">
                    <input type="hidden" name="status" value="selesai">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
