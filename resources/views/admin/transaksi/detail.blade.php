<style>
    .table_modal tr td,
    .table_modal tr td {
        padding: 3px;
        font-size: 12px;
    }

    .modal-body {
        padding: 10px;
    }

    .table-responsive {
        padding: 10px;
    }

    .table.table-striped tr td,
    .table.table-striped tr td {
        padding: 3px;
        font-size: 12px;
    }

    .table.table-clear tr td,
    .table.table-clear tr td {
        padding: 3px;
        font-size: 12px;
    }
</style>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <table border="0" class="table_modal">
                <tr>
                    <td>Kode Pelanggan</td>
                    <td>:</td>
                    <td>{{ $transaksi->member->kode_member }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $transaksi->member->nama }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $transaksi->member->jenis_kelamin }}</td>
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
                    <td>Nomor Hp</td>
                    <td>:</td>
                    <td>{{ $transaksi->member->tlp }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $transaksi->member->alamat }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12">
    <hr>
</div>
<div class="table-responsive">
    <table class="table table-striped" style="width: 100%;">
        <thead>
            <tr>
                <th class="center">#</th>
                <th>Paket</th>
                <th>Jenis</th>
                <th class="right">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            $totalHarga = 0;
            $diskon = $transaksi->diskon; // mengambil nilai diskon dari database
            $diskonNominal = 0;
            $totalSetelahDiskon = 0;
            @endphp
            @foreach ($detailTransaksi as $detail)
            <tr>
                <td class="center">{{ $no++ }}</td>
                <td class="left strong">{{$detail->paket->nama_paket}}</td>
                <td class="center">{{$detail->paket->jenis}}</td>
                <td class="center">Rp. {{ number_format($detail->paket->harga, 0, ',', '.') }}</td>
            </tr>
            @php
            $totalHarga += $detail->paket->harga;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-5 col-sm-5"> </div>
    <div class="col-lg-6 col-sm-5 ms-auto">
        <table class="table table-clear">
            <tbody>
                @php
                $diskonNominal = $totalHarga * ($diskon/100);
                $totalSetelahDiskon = $totalHarga - $diskonNominal;
                @endphp
                <tr>
                    <td class="left"><strong>Total</strong></td>
                    <td class="right">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="left"><strong>Diskon ({{$transaksi->diskon}}%)</strong></td>
                    <td class="right">Rp. {{ number_format($diskonNominal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="left"><strong>Total Biaya</strong></td>
                    <td class="right"><strong>Rp. {{ number_format($totalSetelahDiskon, 0, ',', '.') }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
{{-- <div style="display: flex; justify-content: center;">
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
</div> --}}