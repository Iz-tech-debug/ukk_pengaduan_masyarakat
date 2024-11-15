<div class="modal fade" id="daffatambahpetugas" tabindex="-1" aria-labelledby="daffatambahpetugasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daffatambahpetugasLabel">Tambah Petugas</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambah_petugas') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" id="daffanama" name="daffanama"
                            value="{{ old('daffanama') }}">
                        @error('daffanama')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="daffauser" name="daffauser"
                            value="{{ old('daffauser') }}">
                        @error('daffauser')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="daffapassword" name="daffapassword"
                            value="{{ old('daffapassword') }}">
                        @error('daffapassword')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="number" class="form-control" id="daffatelp" name="daffatelp"
                            value="{{ old('daffatelp') }}">
                        @error('daffatelp')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control" id="daffalevel" name="daffalevel" value="{{ old('daffalevel') }}">
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
