@extends('layouts.main')
@section('konten')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Paket</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Paket</h4>
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
                                        <th>Nama Outlet</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Jenis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($paket as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->outlet->nama }}</td>
                                        <td>{{ $item->nama_paket }}</td>
                                        <td>Rp.{{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btn-modal-edit" item-id="{{ $item->id }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"
                                                    item-bs-toggle="modal" item-bs-target="#modal-edit"
                                                    onclick="edit({{ $item->id }})"><i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                    item-id="{{ $item->id }}" id="btn-delete"
                                                    onclick="destroy({{ $item->id }})"><i
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
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
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
    $(document).ready(function() {
        read()
    });

    // Read Database
    function read() {
        $.get("{{ url('/paket/read') }}", {}, function(data, status) {
            $("#read").html(data);
        });
    }

    // Untuk modal halaman create
    function create() {
        $.get("{{ url('/paket/create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Tambah Paket')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }

    // untuk proses create data
    function store() {
        var nama_paket = $("#nama_paket").val();
        var harga = $("#harga").val();
        var jenis = $("#jenis").val();
        var outlet_id = $("#outlet_id").val();
        $.ajax({
            type: "post",
            url: "{{ url('/paket/store') }}",
            data: {
                'nama_paket': nama_paket,
                'harga': harga,
                'jenis': jenis,
                'outlet_id': outlet_id,
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
        $.get("{{ url('/paket/edit') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit Paket')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }

    // untuk proses update data
    function update(id) {
        var nama_paket = $("#nama_paket").val();
        var harga = $("#harga").val();
        var jenis = $("#jenis").val();
        var outlet_id = $("#outlet_id").val();
        $.ajax({
            type: "post",
            url: "{{ url('/paket/update') }}/" + id,
            data: {
                'nama_paket': nama_paket,
                'harga': harga,
                'jenis': jenis,
                'outlet_id': outlet_id,
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
                    url: "{{ url('/paket/destroy') }}/" + id,
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