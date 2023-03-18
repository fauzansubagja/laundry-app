@extends('layouts.main')
@section('konten')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pesanan</a></li>
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
                                    {{-- {{dd($transaksi)}} --}}
                                    <tr class="btn-reveal-trigger">
                                        <td class="py-2">
                                            <button type="button" id="btn-modal-detail" item-id="{{ $item->id }}"
                                                class="btn btn-info shadow btn-xs sharp me-1" item-bs-toggle="modal"
                                                item-bs-target="#modal-detail" onclick="detail({{ $item->id }})"
                                                title="Lihat"><i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                        <td class="py-2">
                                            <a href="#"><strong>#{{ $item->id }}</strong></a> by
                                            <strong>{{ $item->user->name }}</strong><br><a>{{ $item->user->email }}</a>
                                        </td>
                                        <td class="py-2">{{ date('Y-m-d', strtotime($item->tgl_transaksi)) }}</td>
                                        <td class="py-2">{{ $item->member->nama }}, {{ $item->member->alamat }}
                                            <p class="mb-0 text-500">Via Flat Rate</p>
                                        </td>
                                        <td class="py-2 text-end">
                                            @if ($item->status == 'Baru')
                                            <span class="badge badge-secondary" id="status">{{ $item->status }}<span
                                                    class="ms-1 fa fa-archive"></span></span>
                                            @elseif ($item->status == 'Proses')
                                            <span class="badge badge-primary" id="status">{{ $item->status }}<span
                                                    class="ms-1 fa fa-redo"></span></span>
                                            @elseif ($item->status == 'Selesai')
                                            <span class="badge badge-success" id="status">{{ $item->status }}<span
                                                    class="ms-1 fa fa-check"></span></span>
                                            @elseif ($item->status == 'Diambil')
                                            <span class="badge badge-warning" id="status">{{ $item->status }}<span
                                                    class="ms-1 fa fa-paper-plane"></span></span>
                                            @elseif ($item->status == 'Dikirim')
                                            <span class="badge badge-info" id="status">{{ $item->status }}<span
                                                    class="ms-1 fa fa-paper-plane"></span></span>
                                            @endif
                                        </td>
                                        <td class="py-2 text-end">Rp.
                                            {{ number_format($item->total_biaya, 0, ',', '.') }}
                                        </td>
                                        <td class="py-2 text-end">
                                            <form action="/pelanggan/{{ $item->id }}/status" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="dropdown text-sans-serif"><button
                                                        class="btn btn-primary tp-btn-light sharp" type="button"
                                                        id="order-dropdown-0" data-bs-toggle="dropdown"
                                                        data-boundary="viewport" aria-haspopup="true"
                                                        aria-expanded="false"><span><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewbox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12" r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg></span></button>

                                                    <div class="dropdown-menu dropdown-menu-end border py-0"
                                                        aria-labelledby="order-dropdown-0">
                                                        <div class="py-2">
                                                            <button class="dropdown-item" type="submit" name="status"
                                                                value="Selesai">Selesai</button>
                                                            <button class="dropdown-item" type="submit" name="status"
                                                                value="Proses">Proses</button>
                                                            <button class="dropdown-item" type="submit" name="status"
                                                                value="Diambil">Diambil</button>
                                                            <button class="dropdown-item" type="submit" name="status"
                                                                value="Dikirim">Dikirim</button>
                                                        </div>
                                                    </div>
                                            </form>
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
        <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div id="page1"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary mx-auto w-100">Cetak Transaksi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('ajax_crud')
<script>
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    dropdownItems.forEach(function(dropdownItem) {
        dropdownItem.addEventListener('click', function() {
            // const status = dropdownItem.dataset.status;
            // console.log(status);
            const id = 1; // Isi dengan ID order yang ingin diupdate statusnya
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const status = $(this).data('status')
            $.ajax({
                url: `/pelanggan/${id}/status`,
                type: 'POST',
                data: {
                    '_method' : 'PUT',
                    '_token': '{{ csrf_token() }}',
                    'status': status
                },
                success: function(data) {
            }
            });
        });
    });
</script>

<script>
    // Untuk modal halaman edit show
        function detail(id) {
            $.get("{{ url('/pesanan/detail') }}/" + id, {}, function(data, status) {
                // console.log(data)
                $("#exampleModalLabel").html('Detail Pesanan')
                $("#page1").html(data);
                $("#basicModal").modal('show');
            });
        }
</script>
@endpush