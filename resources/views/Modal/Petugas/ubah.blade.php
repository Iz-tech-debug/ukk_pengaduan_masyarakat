<div class="modal fade" id="daffaubahpetugas{{ $daffaitem->id_petugas }}" tabindex="-1" aria-labelledby="daffaubahpetugasLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daffaubahpetugasLabel">Ubah Data Petugas</h5>
            </div>
            <div class="modal-body">
                <form action="/ubah_petugas/{{ $daffaitem->id_petugas }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="daffanama" name="daffanama"
                            value="{{ $daffaitem->nama_petugas }}" required>
                        @error('daffanama')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="daffauser" name="daffauser"
                            value="{{ $daffaitem->username }}" required>
                        @error('daffauser')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="daffapassword" name="daffapassword" required>
                        @error('daffapassword')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="number" class="form-control" id="daffatelp" name="daffatelp"
                            value="{{ $daffaitem->telp }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        @error('daffatelp')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="daffalevel" name="daffalevel" value="{{ $daffaitem->level }}" required>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                        @error('daffalevel')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
