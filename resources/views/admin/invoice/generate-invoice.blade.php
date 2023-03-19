<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 15px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #6c4bae;
            color: #fff;
        }
    </style>
</head>

<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">LaundryOn</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $transaksi->kode_invoice }}</span> <br>
                    <span>Tanggal: {{ date('d / m / Y')}}</span> <br>
                    <span>Kode Pelanggan : {{ $transaksi->member->kode_member }}</span> <br>
                    <span>Alamat: {{ $transaksi->member->alamat }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Detail Transaksi</th>
                <th width="50%" colspan="2">Detail Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID Transaksi:</td>
                <td>{{$transaksi->id}}</td>

                <td>Kode Pelanggan:</td>
                <td>{{$transaksi->member->kode_member}}</td>
            </tr>
            <tr>
                <td>Pegawai:</td>
                <td>{{ $transaksi->user->name }}</td>

                <td>Nama Pelanggan:</td>
                <td>{{$transaksi->member->nama}}</td>
            </tr>
            <tr>
                <td>Tanggal Transaksi:</td>
                <td>{{ $transaksi->tgl_transaksi }}</td>

                <td>No Handphone:</td>
                <td>{{$transaksi->member->tlp}}</td>
            </tr>
            <tr>
                <td>Status Pembayaran:</td>
                <td>{{$transaksi->dibayar}}</td>

                <td>Jenis Kelamin:</td>
                <td>{{$transaksi->member->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>{{ $transaksi->status }}</td>

                <td>Alamat:</td>
                <td>{{$transaksi->member->alamat}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="4">
                    Paket
                </th>
            </tr>
            <tr class="bg-blue">
                <th>No</th>
                <th>Paket</th>
                <th>Jenis</th>
                <th>Total</th>
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
                <td width="10%">{{ $no++ }}</td>
                <td>{{$detail->paket->nama_paket}}</td>
                <td width="15%">{{$detail->paket->jenis}}</td>
                <td width="15%">Rp. {{ number_format($detail->paket->harga, 0, ',', '.') }}</td>
            </tr>
            @php
            $totalHarga += $detail->paket->harga;
            @endphp
            @endforeach
            @php
            $diskonNominal = $totalHarga * ($diskon/100);
            $totalSetelahDiskon = $totalHarga - $diskonNominal;
            @endphp
            <tr>
                <td colspan="3" width="80%" class="total-heading">Total:</td>
                <td colspan="1">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3" width="80%" class="total-heading">Diskon ({{$transaksi->diskon}}%):</td>
                <td colspan="1">Rp. {{ number_format($diskonNominal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3" width="80%" class="total-heading">Total Biaya:</td>
                <td colspan="1" class="total-heading">Rp. {{ number_format($totalSetelahDiskon, 0, ',', '.') }}</td>
            </tr>

        </tbody>
    </table>

    <br>
    <p class="text-center">
        Terima kasih telah memilih laundry kami!
    </p>

</body>

</html>