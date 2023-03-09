<form>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Outlet</label>
                <input type="text" class="form-control" value="{{ $outlet->nama }}" placeholder="Nama Outlet">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Member</label>
                <input type="text" class="form-control" value="{{ $member->nama }}" placeholder="Member">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">User</label>
                <input type="text" class="form-control" value="{{ $user->name }}" placeholder="User">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Paket</label>
                <select class="default-select  form-control wide" name="paket_id" id="paket_id">
                    @foreach ($paket as $item)
                    <option value="{{ $item->id}}">{{ $item->nama_paket}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Kode Invoice</label>
                <input type="text" name="kode_invoice" id="kode_invoice" class="form-control"
                    placeholder="Kode Invoice">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3 col-md-12">
                <label class="form-label">Tanggal Transaksi</label>
                <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control"
                    placeholder="Tanggal Transaksi">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Diskon</label>
                <input type="text" name="diskon" id="diskon" class="form-control" placeholder="Diskon">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Total Biaya</label>
                <input type="text" name="total_biaya" id="total_biaya" class="form-control" placeholder="Total Biaya">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Status</label>
                <select class="default-select  form-control wide" name="status" id="status">
                    <option value="baru">Baru</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="diambil">Sudah di Ambil</option>
                </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Status Bayar</label>
                <select class="default-select  form-control wide" name="dibayar" id="dibayar">
                    <option value="dibayar">Dibayar</option>
                    <option value="belum_dibayar">Belum Dibayar</option>
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onclick="store()">Simpan</button>
        </div>
    </div>
</form>