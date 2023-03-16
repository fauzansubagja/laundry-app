<style>
    .table_modal tr td, .table_modal tr td{
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
                    <td>{{$transaksi->kode_invoice}}</td>
                </tr>
                <tr>
                    <td>Outlet</td>
                    <td>:</td>
                    <td>{{$transaksi->outlet->nama}}</td>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td>{{$transaksi->member->nama}}</td>
                </tr>
                <tr>
                    <td>Petugas</td>
                    <td>:</td>
                    <td>{{$transaksi->user->name}}</td>
                </tr>
                <tr>
                    <td>Paket</td>
                    <td>:</td>
                    <td>{{$transaksi->paket->nama_paket}}</td>
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
                    <td>{{$transaksi->status}}</td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td>{{$transaksi->diskon}}</td>
                </tr>
                <tr>
                    <td>Total Biaya</td>
                    <td>:</td>
                    <td>{{$transaksi->total_biaya}}</td>
                </tr>
                <tr>
                    <td>Ket Bayar</td>
                    <td>:</td>
                    <td>{{$transaksi->dibayar}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
