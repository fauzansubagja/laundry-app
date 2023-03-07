<form>
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" name="nama" id="nama" value="{{ $data->nama }}" class="form-control"
                placeholder="Nama Pelanggan">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ $data->alamat }}" class="form-control"
                placeholder="Alamat">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">No Telephone</label>
            <input type="text" name="tlp" id="tlp" value="{{ $data->tlp }}" class="form-control"
                placeholder="No Telephone">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onClick="update({{ $data->id }})">Simpan</button>
        </div>
    </div>
</form>