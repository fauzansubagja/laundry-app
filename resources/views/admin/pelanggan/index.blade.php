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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pelanggan</h4>
                        {{-- <button class="btn btn-primary" onClick="create()">+ Tambah Product</button> --}}
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
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telephone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="read">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="page" class="p-2"></div>
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
        $.get("{{ url('read') }}", {}, function(data, status) {
            $("#read").html(data);
        });
    }
    // Untuk modal halaman create
    function create() {
        $.get("{{ url('create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Tambah Pelanggan')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
    // untuk proses create data
    function store() {
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var tlp = $("#tlp").val();
        var jenis_kelamin = $("#jenis_kelamin").val();
        $.ajax({
            type: "get",
            url: "{{ url('store') }}",
            data: "nama=" + nama,
            "alamat=" + alamat,
            "tlp=" + tlp,
            "jenis_kelamin=" + jenis_kelamin,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }
    // Untuk modal halaman edit show
    function edit(id) {
        $.get("{{ url('edit') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit Pelanggan')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
    // untuk proses update data
    function update(id) {
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var tlp = $("#tlp").val();
        var jenis_kelamin = $("#jenis_kelamin").val();
        $.ajax({
            type: "get",
            url: "{{ url('update') }}/" + id,
            data: "nama=" + nama,
            "alamat=" + alamat,
            "tlp=" + name,
            "jenis_kelamin=" + jenis_kelamin,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }
    // untuk delete atau destroy data
    function destroy(id) {
        $.ajax({
            type: "get",
            url: "{{ url('destroy') }}/" + id,
            data: "name=" + name,
            success: function(data) {
                $(".btn-close").click();
                read()
            }
        });
    }
</script>
@endpush