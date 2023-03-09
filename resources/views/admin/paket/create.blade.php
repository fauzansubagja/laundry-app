<form>
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label">Nama Paket</label>
            <input type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="Nama Paket">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" oninput="formatRupiah(this)">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Jenis</label>
            <select class="default-select  form-control wide" name="jenis" id="jenis">
                <option value="kiloan">Kilioan</option>
                <option value="selimut">Selimut</option>
                <option value="bed_cover">Bed Cover</option>
                <option value="kaos">Kaos</option>
                <option value="lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">Nama Outlet</label>
            <select class="default-select  form-control wide" name="outlet_id" id="outlet_id">
                @foreach ($outlet as $item)    
                <option value="{{ $item->id}}">{{ $item->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onclick="store()">Simpan</button>
        </div>
    </div>
</form>
