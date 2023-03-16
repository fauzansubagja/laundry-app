<form>
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label">Nama Outlet</label>
            <input type="text" name="nama" id="nama" value="{{ $outlet->nama }}" class="form-control"
                placeholder="Nama Outlet">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ $outlet->alamat }}" class="form-control"
                placeholder="Alamat">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">No Telephone</label>
            <input type="text" name="tlp" id="tlp" value="{{ $outlet->tlp }}" class="form-control"
                placeholder="No Telephone">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onClick="update({{ $outlet->id }})">Simpan</button>
        </div>
    </div>
</form>