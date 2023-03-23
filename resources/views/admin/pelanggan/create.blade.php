<form>
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label">Kode Pelanggan</label>
            <input type="text" name="kode_member" id="kode_member" class="form-control" value="{{ $kode_member }}"
                readonly>
        </div>

        <div class="mb-3 col-md-12">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelanggan">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">No Telephone</label>
            <input type="text" name="tlp" id="tlp" class="form-control" placeholder="No Telephone">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Jenis Kelamin</label>
            <select class="default-select  form-control wide" name="jenis_kelamin" id="jenis_kelamin">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onclick="store()">Simpan</button>
        </div>
    </div>
</form>