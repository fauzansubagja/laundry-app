<link rel="stylesheet" href="assets/vendor/select2/css/select2.min.css">
<link href="assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<script src="assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="assets/vendor/select2/js/select2.full.min.js"></script>
<script src="assets/js/plugins-init/select2-init.js"></script>
<script src="assets/js/custom.min.js"></script>`
<form>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3 col-md-12">
                <label class="form-label">Kode Invoice</label>
                <input type="text" name="kode_invoice" id="kode_invoice" class="form-control"
                    placeholder="Kode Invoice" disabled value={{ $transaksi->kode_invoice }}>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Outlet</label>
                <input type="text" class="form-control" value="{{ Auth::user()->outlet->nama }}" readonly>
                <input type="hidden" name="outlet_id" id="outlet_id" value="{{ Auth::user()->outlet_id }}">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Member</label>
                <input type="text" class="form-control" value="{{ $transaksi->member->nama }}" readonly>
                <input type="hidden" name="member_id" id="member_id" class="form-control"
                    value="{{ $transaksi->member->id }}" readonly>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Kasir</label>
                <input type="text" class="form-control" value="{{ $userData->username }}" readonly>
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Nama Paket</label>
                <select class="multi-select" name="paket_id[]" id="paket_id" multiple="multiple">
                    @foreach ($paket as $item)
                        <option value="{{ $item->id }}" {{ in_array($item->id, $paketTerpilih) ? 'selected' : '' }}>
                            {{ $item->nama_paket }}
                        </option>
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
                    readonly value="{{ $transaksi->total_biaya }}">
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
        var total_biaya = 0;
        $('#paket_id option:selected').each(function() {
            var id = $(this).val();
            $.ajax({
                url: '/transaksi/get-price/' + id,
                method: 'GET',
                success: function(response) {
                    total_biaya += response.harga;
                    var diskon_biaya = 0;
                    if (diskon) {
                        diskon = diskon.replace('%', ''); // remove % character
                        diskon_biaya = (diskon / 100) * total_biaya;
                    }
                    $('#total_biaya').val(total_biaya - diskon_biaya);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });

    // event listener untuk inputan paket_id
    $('#paket_id').on('change', function() {
        var total_biaya = 0;
        $('#paket_id option:selected').each(function() {
            var id = $(this).val();
            $.ajax({
                url: '/transaksi/get-price/' + id,
                method: 'GET',
                success: function(response) {
                    total_biaya += response.harga;
                    var diskon = $('#diskon').val();
                    var diskon_biaya = 0;
                    if (diskon) {
                        diskon = diskon.replace('%', ''); // remove % character
                        diskon_biaya = (diskon / 100) * total_biaya;
                    }
                    $('#total_biaya').val(total_biaya - diskon_biaya);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
