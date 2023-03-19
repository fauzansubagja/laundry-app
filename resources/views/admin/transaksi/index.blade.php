@extends('layouts.main')
@section('konten')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Transaksi</h4>
                        <button type="button" class="btn btn-rounded btn-primary" onClick="create()"><i
                                class="fas fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Paket</th>
                                        <th>Kode Invoice</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th>Status Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->member->nama }}</td>
                                        <td>
                                            @foreach ($item->detailTransaksi as $detail)
                                            {{ $detail->paket->nama_paket }}
                                            @endforeach
                                        </td>
                                        <td>{{ $item->kode_invoice }}</td>
                                        <td>Rp. {{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($item->status == 'Baru')
                                            <button type="button" class="btn btn-rounded btn-primary btn-xs"
                                                disabled="disabled">{{ $item->status }}</button>
                                            @elseif($item->status == 'Proses')
                                            <button type="button" class="btn btn-rounded btn-secondary btn-xs"
                                                disabled="disabled">{{ $item->status }}</button>
                                            @elseif($item->status == 'Selesai')
                                            <button type="button" class="btn btn-rounded btn-success btn-xs"
                                                disabled="disabled">{{ $item->status }}</button>
                                            @elseif($item->status == 'Diambil')
                                            <button type="button" class="btn btn-rounded btn-danger btn-xs"
                                                disabled="disabled">{{ $item->status }}</button>
                                            @elseif($item->status == 'Dikirim')
                                            <button type="button" class="btn btn-rounded btn-danger btn-xs"
                                                disabled="disabled">{{ $item->status }}</button>
                                            @endif
                                        </td>
                                        <td>{{ $item->dibayar }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btn-modal-detail" item-id="{{ $item->id }}"
                                                    class="btn btn-info shadow btn-xs sharp me-1" item-bs-toggle="modal"
                                                    item-bs-target="#modal-detail" onclick="detail({{ $item->id }})"
                                                    title="Lihat"><i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" id="btn-modal-edit" item-id="{{ $item->id }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"
                                                    item-bs-toggle="modal" item-bs-target="#modal-edit"
                                                    onclick="edit({{ $item->id }})" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                    item-id="{{ $item->id }}" id="btn-delete"
                                                    onclick="destroy({{ $item->id }})" title="Hapus"><i
                                                        class="fa fa-trash"></i></button>
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


        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="basic-form">
                                <div id="page"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="basicModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Keterangan Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div id="page1"></div>
                    <div class="modal-footer">
                        @foreach ($transaksi as $item)
                        <a href="{{ route('invoice.generate', ['id' => $item->id]) }}" download
                            class="btn btn-primary mx-auto w-100">Cetak Transaksi</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('ajax_crud')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    function formatRupiah(angka) {
            var number_string = angka.value.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            angka.value = 'Rp ' + rupiah;
        }
</script>
<script>
    $(document).ready(function() {
            read()
        });
        // Read Database
        function read() {
            $.get("{{ url('/transaksi/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        function create() {
            $.get("{{ url('/transaksi/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Tambah Transaksi')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        // untuk proses create data
        function store() {
            var outlet_id = $("#outlet_id").val();
            var member_id = $("#member_id").val();
            var user_id = $("#user_id").val();
            var paket_id = $("#paket_id").val();
            var kode_invoice = $("#kode_invoice").val();
            var tgl_transaksi = $("#tgl_transaksi").val();
            var diskon = $("#diskon").val();
            var total_biaya = $("#total_biaya").val();
            var status = $("#status").val();
            var dibayar = $("#dibayar").val();
            $.ajax({
                type: "post",
                url: "{{ url('/transaksi/store') }}",
                data: {
                    'outlet_id': outlet_id,
                    'member_id': member_id,
                    'user_id': user_id,
                    'paket_id': paket_id,
                    'kode_invoice': kode_invoice,
                    'tgl_transaksi': tgl_transaksi,
                    'diskon': diskon,
                    'total_biaya': total_biaya,
                    'status': status,
                    'dibayar': dibayar,
                    '_token': '{{ csrf_token() }}',
                },
                success: function(data) {
                    $(".btn-close").click();
                    read()
                    location.reload();
                }
            });
        }
        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('/transaksi/edit') }}/" + id, {}, function(data, status) {
                // console.log(data)
                $("#exampleModalLabel").html('Edit Transaksi')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        // Untuk modal halaman edit show
        function detail(id) {
            $.get("{{ url('/transaksi/detail') }}/" + id, {}, function(data, status) {
                // console.log(data)
                $("#exampleModalLabel").html('Detail Transaksi')
                $("#page1").html(data);
                $("#basicModal").modal('show');
            });
        }
        // untuk proses update data
        function update(id) {
            var outlet_id = $("#outlet_id").val();
            var member_id = $("#member_id").val();
            var user_id = $("#user_id").val();
            var paket_id = $("#paket_id").val();
            var kode_invoice = $("#kode_invoice").val();
            var tgl_transaksi = $("#tgl_transaksi").val();
            var diskon = $("#diskon").val();
            var total_biaya = $("#total_biaya").val();
            var status = $("#status").val();
            var dibayar = $("#dibayar").val();
            $.ajax({
                type: "post",
                url: "{{ url('/transaksi/update') }}/" + id,
                data: {
                    'outlet_id': outlet_id,
                    'member_id': member_id,
                    'user_id': user_id,
                    'paket_id': paket_id,
                    'kode_invoice': kode_invoice,
                    'tgl_transaksi': tgl_transaksi,
                    'diskon': diskon,
                    'total_biaya': total_biaya,
                    'status': status,
                    'dibayar': dibayar,
                    '_token': '{{ csrf_token() }}',
                    '_method': 'PUT',
                },
                success: function(data) {
                    $(".btn-close").click();
                    read()
                    location.reload();
                }
            });
        }
        // untuk delete atau destroy data
        function destroy(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan bisa mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/transaksi/destroy') }}/" + id,
                    data: {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'delete',
                    },
                    success: function(data) {
                        $(".btn-close").click();
                        read();
                        location.reload();
                        Swal.fire(
                            'Deleted!',
                            'Item has been deleted.',
                            'success'
                        )
                    },
                    error: function(data) {
                        Swal.fire(
                            'Oops...',
                            'Something went wrong!',
                            'error'
                        )
                    }
                });
            }
        });
    }
</script>
@endpush