<div class="modal fade" id="daffaselesaikan{{ $daffaitem->id_pengaduan }}" tabindex="-1"
    aria-labelledby="selesaikanPengaduanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/selesaikan_pengaduan/{{ $daffaitem->id_pengaduan }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="selesaikanPengaduanLabel">Selesaikan Pengaduan</h5>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menyelesaikan pengaduan ini?</p>
                    <input type="hidden" name="id_pengaduan" value="{{ $daffaitem->id_pengaduan }}">
                    <input type="hidden" name="status" value="selesai">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Selesaikan</button>
                </div>
            </form>
        </div>
    </div>
</div>
