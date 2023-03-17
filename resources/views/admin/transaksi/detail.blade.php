<style>
    .table_modal tr td,
    .table_modal tr td {
        padding: 5px;
        font-size: 11px;
    }
</style>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <table border="0" class="table_modal">
                <tr>
                    <td>Kode Invoice</td>
                    <td>:</td>
                    <td>{{ $transaksi->kode_invoice }}</td>
                </tr>
                <tr>
                    <td>Outlet</td>
                    <td>:</td>
                    <td>{{ $transaksi->outlet->nama }}</td>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td>{{ $transaksi->member->nama }}</td>
                </tr>
                <tr>
                    <td>Petugas</td>
                    <td>:</td>
                    <td>{{ $transaksi->user->name }}</td>
                </tr>
                <tr>
                    <td>Paket</td>
                    <td>:</td>
                    <td>
                        @foreach ($detailTransaksi as $detail)
                            {{ $detail->paket->nama_paket }}
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table border="0" class="table_modal">
                <tr>
                    <td>Tgl Transaksi</td>
                    <td>:</td>
                    <td>{{ date('Y-m-d', strtotime($transaksi->tgl_transaksi)) }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if ($transaksi->status == 'Baru')
                            <button type="button" class="btn btn-rounded btn-primary btn-xxs"
                                disabled="disabled">{{ $transaksi->status }}</button>
                        @elseif($transaksi->status == 'Proses')
                            <button type="button" class="btn btn-rounded btn-secondary btn-xxs"
                                disabled="disabled">{{ $transaksi->status }}</button>
                        @elseif($transaksi->status == 'Selesai')
                            <button type="button" class="btn btn-rounded btn-success btn-xxs"
                                disabled="disabled">{{ $transaksi->status }}</button>
                        @elseif($transaksi->status == 'Diambil')
                            <button type="button" class="btn btn-rounded btn-danger btn-xxs"
                                disabled="disabled">{{ $transaksi->status }}</button>
                        @elseif($transaksi->status == 'Dikirim')
                            <button type="button" class="btn btn-rounded btn-danger btn-xxs"
                                disabled="disabled">{{ $transaksi->status }}</button>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td>{{ $transaksi->diskon }}</td>
                </tr>
                <tr>
                    <td>Total Biaya</td>
                    <td>:</td>
                    <td>{{ $transaksi->total_biaya }}</td>
                </tr>
                <tr>
                    <td>Ket Bayar</td>
                    <td>:</td>
                    <td>{{ $transaksi->dibayar }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div style="display: flex; justify-content: center;">
    @if ($transaksi->status == 'Baru')
        <img src="assets/images/status/baru.gif" alt="" style="width: 30%; height: auto;">
    @elseif($transaksi->status == 'Proses')
        <img src="assets/images/status/proses.gif" alt="" style="width: 30%; height: auto;">
    @elseif($transaksi->status == 'Selesai')
        <img src="assets/images/status/selesai.gif" alt="" style="width: 30%; height: auto;">
    @elseif($transaksi->status == 'Diambil')
        <img src="assets/images/status/diambil.gif" alt="" style="width: 30%; height: auto;">
    @elseif($transaksi->status == 'Dikirim')
        <img src="assets/images/status/dikirim.gif" alt="" style="width: 30%; height: auto;">
    @endif
</div>
