{{-- Modal --}}
<div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="daftarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title">DAFTAR</h5>
                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="daffanik">NIK</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="daffanik" name="daffanik" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="daffausername">Nama User</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" id="daffausername" name="daffausername" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="daffapassword">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="daffapassword" name="daffapassword" required>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
