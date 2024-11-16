{{-- Modal Hapus Masyarakat --}}
<div class="modal fade" id="daffahapusmasyarakat{{ $daffaitem->id }}" tabindex="-1" aria-labelledby="daffahapusmasyarakatLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daffahapusmasyarakatLabel">Hapus Data Masyarakat</h5>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data masyarakat <strong>{{ $daffaitem->nama }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="/hapus_masyarakat/{{ $daffaitem->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
