@extends('layouts.main')
@section('konten')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6">
                                <div class="widget-stat card bg-primary">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="flaticon-381-user-7"></i>
                                            </span>
                                            <div class="media-body text-white text-end">
                                                <p class="mb-1">Pelanggan</p>
                                                <h3 class="text-white">{{ $members }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="widget-stat card bg-danger">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-store"></i>
                                            </span>
                                            <div class="media-body text-white text-end">
                                                <p class="mb-1">Outlet</p>
                                                <h3 class="text-white">{{ $outlets }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="widget-stat card bg-success">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-shopping-bag"></i>
                                            </span>
                                            <div class="media-body text-white text-end">
                                                <p class="mb-1">Total Pesanan</p>
                                                <h3 class="text-white">{{ $transaksi_baru }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6">
                                <div class="widget-stat card bg-info">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-check"></i>
                                            </span>
                                            <div class="media-body text-white text-end">
                                                <p class="mb-1">Selesai</p>
                                                <h3 class="text-white">{{ $selesai }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 pb-0">
                                        <h4 class="fs-20 font-w700 mb-0">Penjualan Harian</h4>
                                        <div class="dropdown ">
                                            <div class="btn-link" data-bs-toggle="dropdown">
                                                <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
                                                    <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
                                                    <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pb-0">
                                        <div id="revenueMap" class="revenueMap"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xl-6 col-xxl-12 col-sm-6">
                                        <div class="card">
                                            <div class="card-header border-0">
                                                <div>
                                                    <h4 class="fs-20 font-w700">Kinerja Pesanan</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="emailchart"> </div>
                                                <div class="mb-3 mt-4">
                                                    <h4 class="fs-18 font-w600">Total Order</h4>
                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <span class="fs-18 font-w500">
                                                            <svg class="me-3" width="20" height="20" viewbox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="20" height="20" rx="6" fill="#886CC0">
                                                                </rect>
                                                            </svg>
                                                            Pesanan Selesai
                                                        </span>
                                                        <span class="fs-18 font-w600">763</span>
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-center justify-content-between  mb-4">
                                                        <span class="fs-18 font-w500">
                                                            <svg class="me-3" width="20" height="20" viewbox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="20" height="20" rx="6" fill="#26E023">
                                                                </rect>
                                                            </svg>
                                                            Pesanan Tersisa
                                                        </span>
                                                        <span class="fs-18 font-w600">321</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection