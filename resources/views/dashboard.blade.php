@extends('layouts.main')
@section('konten')
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
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            @canany(['admin', 'owner', 'kasir'])
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
                                        <div class="widget-stat card bg-info">
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
                                        <div class="widget-stat card bg-success">
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
                                                                    <svg class="me-3" width="20" height="20"
                                                                        viewbox="0 0 20 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="20" height="20" rx="6"
                                                                            fill="#26E023">
                                                                        </rect>
                                                                    </svg>
                                                                    Pesanan Selesai
                                                                </span>
                                                                <span class="fs-18 font-w600">{{ $selesai }}</span>
                                                            </div>
                                                            <div
                                                                class="d-flex align-items-center justify-content-between  mb-4">
                                                                <span class="fs-18 font-w500">
                                                                    <svg class="me-3" width="20" height="20"
                                                                        viewbox="0 0 20 20" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="20" height="20" rx="6"
                                                                            fill="#886CC0">
                                                                        </rect>
                                                                    </svg>
                                                                    Pesanan Tersisa
                                                                </span>
                                                                <span class="fs-18 font-w600">{{ $transaksi_baru }}</span>
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
            @endcanany
            @can('member')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th class="align-middle">Pesanan</th>
                                                <th class="align-middle pe-7">Tanggal</th>
                                                <th class="align-middle">Outlet</th>
                                                <th class="align-middle text-end">Status</th>
                                                <th class="align-middle text-end">Jumlah Bayar</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="orders">
                                            @php $no = 1; @endphp
                                            @foreach ($transaksis as $item)
                                                <tr class="btn-reveal-trigger">
                                                    <td class="py-2">
                                                        <button type="button" id="btn-modal-detail"
                                                            item-id="{{ $item->id }}"
                                                            class="btn btn-info shadow btn-xs sharp me-1"
                                                            item-bs-toggle="modal" item-bs-target="#modal-detail"
                                                            onclick="detail({{ $item->id }})" title="Lihat"><i
                                                                class="fas fa-eye"></i>
                                                        </button>
                                                    </td>
                                                    <td class="py-2">
                                                        <a href="#"><strong>#{{ $no++ }}</strong></a> by
                                                        <strong>{{ $item->user->name }}</strong><br><a>{{ $item->user->username }}</a>
                                                    </td>
                                                    <td class="py-2">{{ date('Y-m-d', strtotime($item->tgl_transaksi)) }}
                                                    </td>
                                                    <td class="py-2">{{ $item->outlet->nama }}</td>
                                                    <td class="py-2 text-end">
                                                        @if ($item->status == 'Baru')
                                                            <span class="badge badge-secondary"
                                                                id="status">{{ $item->status }}<span
                                                                    class="ms-1 fa fa-archive"></span></span>
                                                        @elseif ($item->status == 'Proses')
                                                            <span class="badge badge-primary"
                                                                id="status">{{ $item->status }}<span
                                                                    class="ms-1 fa fa-redo"></span></span>
                                                        @elseif ($item->status == 'Selesai')
                                                            <span class="badge badge-success"
                                                                id="status">{{ $item->status }}<span
                                                                    class="ms-1 fa fa-check"></span></span>
                                                        @elseif ($item->status == 'Diambil')
                                                            <span class="badge badge-warning"
                                                                id="status">{{ $item->status }}<span
                                                                    class="ms-1 fa fa-paper-plane"></span></span>
                                                        @elseif ($item->status == 'Dikirim')
                                                            <span class="badge badge-info"
                                                                id="status">{{ $item->status }}<span
                                                                    class="ms-1 fa fa-paper-plane"></span></span>
                                                        @endif
                                                    </td>
                                                    <td class="py-2 text-end">Rp.
                                                        {{ number_format($item->total_biaya, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="basicModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Pesanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div id="page1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
<script>
    // Untuk modal halaman show
    function detail(id) {
        $.get("{{ url('/pesanan/detail') }}/" + id, {}, function(data, status) {
            // console.log(data)
            $("#exampleModalLabel").html('Detail Pesanan')
            $("#page1").html(data);
            $("#basicModal").modal('show');
        });
    }
</script>
<script>
    var revenueMap = function() {
        var options = {
            series: [{
                name: "Pemasukan Hari ini",
                data: [
                    {{ $totalBiayaPerDay[0] }},
                    {{ $totalBiayaPerDay[1] }},
                    {{ $totalBiayaPerDay[2] }},
                    {{ $totalBiayaPerDay[3] }},
                    {{ $totalBiayaPerDay[4] }},
                    {{ $totalBiayaPerDay[5] }},
                    {{ $totalBiayaPerDay[6] }},
                ],
            }, ],
            chart: {
                type: "line",
                height: 368,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    endingShape: "rounded",
                },
            },
            colors: ["#886CC0"],
            dataLabels: {
                enabled: false,
            },
            markers: {
                shape: "circle",
            },

            legend: {
                show: false,
            },
            stroke: {
                show: true,
                width: 10,
                curve: "smooth",
                colors: ["var(--primary)"],
            },

            grid: {
                borderColor: "#eee",
                show: true,
                xaxis: {
                    lines: {
                        show: true,
                    },
                },
                yaxis: {
                    lines: {
                        show: false,
                    },
                },
            },
            xaxis: {
                categories: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
                labels: {
                    style: {
                        colors: "#7E7F80",
                        fontSize: "13px",
                        fontFamily: "Poppins",
                        fontWeight: 100,
                        cssClass: "apexcharts-xaxis-label",
                    },
                },
                crosshairs: {
                    show: false,
                },
            },
            yaxis: {
                show: true,
                labels: {
                    offsetX: -15,
                    style: {
                        colors: "#7E7F80",
                        fontSize: "14px",
                        fontFamily: "Poppins",
                        fontWeight: 100,
                    },
                    formatter: function(y) {
                        // format number to IDR currency format
                        var formatter = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        });

                        // convert y to thousands and format to IDR currency string
                        var val = y / 1000;
                        var formattedVal = formatter.format(val);

                        // remove trailing zeros and return formatted IDR currency string
                        return formattedVal.replace(/\.00$/g, "") + "k";
                    },

                },
            },
            fill: {
                opacity: 1,
                colors: "#FAC7B6",
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        // format number to IDR currency format
                        var formatter = new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        });

                        // return formatted IDR currency string
                        return formatter.format(val);
                    },
                },
            },

        };

        var chartBar1 = new ApexCharts(
            document.querySelector("#revenueMap"),
            options
        );
        chartBar1.render();
    };
</script>

<script>
    var emailchart = function() {
        var options = {
            labels: ['Pesanan Selesai', 'Pesanan Tersisa'],
            series: [
                {{ $selesai }}, // mengambil data dari variabel $selesai
                {{ $transaksi_baru }} // mengambil data dari variabel $transaksi_baru
            ],
            chart: {
                type: "donut",
                height: 300,
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 0,
            },
            colors: ["#26E023", "var(--primary)"],
            legend: {
                position: "bottom",
                show: false,
            },
            responsive: [{
                    breakpoint: 1800,
                    options: {
                        chart: {
                            height: 200,
                        },
                    },
                },
                {
                    breakpoint: 1800,
                    options: {
                        chart: {
                            height: 200,
                        },
                    },
                },
            ],
        };

        var chart = new ApexCharts(
            document.querySelector("#emailchart"),
            options
        );
        chart.render();
    };
</script>
