@extends('layouts.main')
@section('konten')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Laporan Transaksi</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Laporan Transaksi</h4>
                        <a href="{{ route('laporan.export') }}" class="btn btn-success"><span
                                class="btn-icon-start text-success"><i class="fa fa-download color-warning"></i>
                            </span>Export Excel</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Outlet</th>
                                        <th>Kode Invoice</th>
                                        <th>Nama Member</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Total Bayar</th>
                                        <th>Pegawai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->outlet->nama }}</td>
                                        <td>{{ $item->kode_invoice }}</td>
                                        <td>{{ $item->member->nama }}</td>
                                        <td>{{ date('Y-m-d', strtotime($item->tgl_transaksi)) }}</td>
                                        <td>Rp. {{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                                        <td>{{ $item->user->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection