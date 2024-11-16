{{--  --}}
<div class="modal fade" id="daffatambahmasyarakat" tabindex="-1" aria-labelledby="daffatambahmasyarakatLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daffatambahmasyarakatLabel">Tambah Petugas</h5>
            </div>
            <div class="modal-body">
                <form action="/tambah_masyarakat" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="telp">NIK</label>
                        <input type="number" class="form-control" id="daffanik" name="daffanik"
                            value="{{ old('daffanik') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        @error('daffanik')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="daffanama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="daffanama" name="daffanama"
                            value="{{ old('daffanama') }}">
                        @error('daffanama')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="username">Nama Pengguna</label>
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
                            value="{{ old('daffatelp') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                        @error('daffatelp')
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
