<form>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3 col-md-12">
                <label class="form-label">Kode Invoice</label>
                <input type="text" name="kode_invoice" id="kode_invoice" class="form-control" placeholder="Kode Invoice"
                    disabled value={{ $transaksi->kode_invoice }}>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Outlet</label>
                <select class="default-select  form-control wide" name="outlet_id" id="outlet_id">
                    <option value="" selected>-- Pilih Outlet --</option>
                    @foreach ($outlet as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $transaksi->outlet_id ? 'selected' : '' }}>
                        {{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Member</label>
                <select class="default-select  form-control wide" name="member_id" id="member_id">
                    <option value="" selected>-- Pilih Member --</option>
                    @foreach ($member as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $transaksi->member_id ? 'selected' : '' }}>
                        {{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">User</label>
                <select class="default-select  form-control wide" name="user_id" id="user_id">
                    <option value="" selected>-- Pilih Kasir --</option>
                    @foreach ($user as $item)
                    @if ($item->role == 'Kasir')
                    <option value="{{ $item->id }}" {{ $item->id == $transaksi->user_id ? 'selected' : '' }}>{{
                        $item->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Paket</label>
                <select class="default-select form-control wide" name="paket_id" id="paket_id">
                    <option value="" selected>-- Pilih Paket --</option>
                    @foreach ($paket as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $transaksi->paket_id ? 'selected' : '' }}>
                        {{ $item->nama_paket }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3 col-md-12">
                <label class="form-label">Tanggal Transaksi</label>
                <input type="datetime-local" name="tgl_transaksi" id="tgl_transaksi" class="form-control"
                    placeholder="Tanggal Transaksi" value="{{ $transaksi->tgl_transaksi }}">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Diskon</label>
                <input type="text" name="diskon" id="diskon" class="form-control" placeholder="Diskon"
                    onkeyup="addPercent()" value={{ $transaksi->diskon }}>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Total Biaya</label>
                <input type="text" name="total_biaya" id="total_biaya" class="form-control" placeholder="Total Biaya"
                    readonly value={{ $transaksi->total_biaya }}>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Status</label>
                <select class="default-select  form-control wide" name="status" id="status" value=>
                    <option value="baru">Baru</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    <option value="diambil">Diambil</option>
                </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Status Bayar</label>
                <select class="default-select  form-control wide" name="dibayar" id="dibayar">
                    <option value="Dibayar">Dibayar</option>
                    <option value="Belum Dibayar">Belum Dibayar</option>
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCreateClose">Batal</button>
            <button type="button" class="btn btn-primary" onClick="update({{ $transaksi->id }})">Simpan</button>
        </div>
    </div>
</form>
<script>
    function addPercent() {
    if (diskon > 100) {
        alert('Diskon tidak boleh melebihi 100%');
        $(this).val('');
        return;
    }
    var diskonInput = document.getElementById("diskon");
    var diskonValue = parseInt(diskonInput.value);
    if (!isNaN(diskonValue)) {
        diskonInput.value = diskonValue + "%";
    }
}


    // event listener untuk inputan diskon
    $('#diskon').on('change', function() {
        var diskon = $(this).val();
        var total_biaya = $('#total_biaya').val();
        if (diskon) {
            diskon = diskon.replace('%', ''); // remove % character
            var diskon_biaya = (diskon / 100) * total_biaya;
            $('#total_biaya').val(total_biaya - diskon_biaya);
        }
    });
    // fungsi untuk mengambil data harga paket berdasarkan id paket
    function getPaketPrice(id) {
        $.ajax({
            url: '/transaksi/get-price/' + id,
            method: 'GET',
            success: function(response) {
                document.getElementById("total_biaya").value = response.harga
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    // event listener untuk inputan paket_id
    $('#paket_id').on('change', function() {
        var id = $(this).val();
        if (id) {
            getPaketPrice(id);
        } else {
            $('#total_biaya').val('');
        }
    });
</script>