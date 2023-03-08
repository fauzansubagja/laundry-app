<form>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3 col-md-12">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Outlet</label>
                <select class="default-select  form-control wide" name="outlet_id" id="outlet_id">
                    @foreach ($outlet as $item)
                    <option value="{{ $item->id}}">{{ $item->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Hak Akses</label>
                <select class="default-select  form-control wide" name="role" id="role">
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Owner">Owner</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onclick="store()">Simpan</button>
        </div>
    </div>
</form>