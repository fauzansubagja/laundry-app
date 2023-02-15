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
                        <a href="" class="btn btn-rounded btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Member</th>
                                        <th>Jenis Paket</th>
                                        <th>Nama Outlet</th>
                                        <th>Kode Invoice</th>
                                        <th>Berat Cucian</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
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