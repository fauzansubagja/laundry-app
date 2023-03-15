@extends('layouts.main')
@section('konten')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pelanggan</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ol>
        </div>
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
                                        <th class="align-middle" style="min-width: 12.5rem;">Dikirim Ke</th>
                                        <th class="align-middle text-end">Status</th>
                                        <th class="align-middle text-end">Jumlah Bayar</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="orders">
                                    @foreach ($transaksi as $item)
                                    <tr class="btn-reveal-trigger">
                                        <td class="py-2">
                                            <div class="form-check custom-checkbox checkbox-success">
                                                <input type="checkbox" class="form-check-input" id="checkbox">
                                                <label class="form-check-label" for="checkbox"></label>
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <a href="#">
                                                <strong>#{{ $item->id}}</strong></a> by <strong>{{ $item->user->name}}</strong><br><a>{{ $item->user->email}}</a>
                                        </td>
                                        <td class="py-2">{{ $item->tgl_transaksi}}</td>
                                        <td class="py-2">{{ $item->member->nama}}, {{ $item->member->alamat}}
                                            <p class="mb-0 text-500">Via Flat Rate</p>
                                        </td>
                                        <td class="py-2 text-end">
                                            @if ($item->status == 'Baru')
                                                <span class="badge badge-secondary">{{ $item->status }}<span class="ms-1 fa fa-archive"></span></span>
                                            @elseif ($item->status == 'Proses')
                                                <span class="badge badge-primary">{{ $item->status }}<span class="ms-1 fa fa-redo"></span></span>
                                            @elseif ($item->status == 'Selesai')
                                                <span class="badge badge-success">{{ $item->status }}<span class="ms-1 fa fa-check"></span></span>
                                            @elseif ($item->status == 'Diambil')
                                                <span class="badge badge-warning">{{ $item->status }}<span class="ms-1 fa fa-paper-plane"></span></span>
                                            @endif
                                        </td>
                                        <td class="py-2 text-end">Rp. {{ number_format($item->total_biaya, 0, ',', '.') }}
                                        </td>
                                        <td class="py-2 text-end">
                                            <div class="dropdown text-sans-serif"><button
                                                    class="btn btn-primary tp-btn-light sharp" type="button"
                                                    id="order-dropdown-0" data-bs-toggle="dropdown"
                                                    data-boundary="viewport" aria-haspopup="true"
                                                    aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                            height="18px" viewbox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0"
                                                    aria-labelledby="order-dropdown-0">
                                                    <div class="py-2"><a class="dropdown-item" href="javascript:void(0);">Selesai</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Proses</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Diambil</a><a class="dropdown-item"
                                                            href="javascript:void(0);">Dikirim</a>
                                                        <div class="dropdown-divider"></div><a
                                                            class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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

@push('ajax_crud')
@endpush
