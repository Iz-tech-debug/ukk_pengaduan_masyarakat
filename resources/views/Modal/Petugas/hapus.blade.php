{{-- Modal Hapus Petugas --}}
<div class="modal fade" id="hapuspetugas{{ $daffaitem->id_petugas }}" tabindex="-1" aria-labelledby="hapuspetugasLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapuspetugasLabel">Hapus Data Petugas</h5>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data petugas <strong>{{ $daffaitem->nama_petugas }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="/hapus_petugas{{ $daffaitem->id_petugas }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
