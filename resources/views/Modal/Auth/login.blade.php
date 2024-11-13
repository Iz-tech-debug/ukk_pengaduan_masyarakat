<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title">MASUK</h5>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="daffausername">Username</label>
                        <input type="text" class="form-control" id="daffausername" name="daffausername" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="daffapassword">Password</label>
                        <input type="password" class="form-control" id="daffapassword" name="daffapassword" required>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
