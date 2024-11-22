<div class="modal fade" id="daffahapus{{ $daffaitem->id_pengaduan }}" tabindex="-1" aria-labelledby="daffahapusLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daffahapusLabel">Hapus Pengaduan</h5>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus pengaduan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="/hapus_pengaduan/{{ $daffaitem->id_pengaduan }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="daffaid_pengaduan" value="{{ $daffaitem->id_pengaduan }}">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
