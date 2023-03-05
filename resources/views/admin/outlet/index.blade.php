@extends('layouts.main')
@section('konten')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Outlet</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Outlet</h4>
                        <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-create"><i class="fas fa-plus"></i>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="table-outlet">
                                    @php $no = 1; @endphp
                                    @foreach ($outlet as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->tlp }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" id="btn-modal-edit" data-id="{{$data->id}}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"
                                                    data-bs-toggle="modal" data-bs-target="#modal-edit"><i
                                                        class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger shadow btn-xs sharp"
                                                    data-id="{{ $data->id }}" id="btn-delete"><i
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

        {{-- modal create --}}
        <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Outlet</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Nama Outlet</label>
                                            <input type="text" name="nama" id="inputNama" class="form-control"
                                                placeholder="Nama Outlet">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" id="inputAlamat" class="form-control"
                                                placeholder="Alamat">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">No Telephone</label>
                                            <input type="text" name="tlp" id="inputTlp" class="form-control"
                                                placeholder="No Telephone">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="btnCreateClose">Batal</button>
                        <button type="button" class="btn btn-primary" id="btnCreateSimpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal create --}}

        {{-- modal edit --}}
        <div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Outlet</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="basic-form">
                                <form>
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Nama Outlet</label>
                                            <input type="text" name="nama" id="inputNama" class="form-control"
                                                placeholder="Nama Outlet">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" id="inputAlamat" class="form-control"
                                                placeholder="Alamat">
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">No Telephone</label>
                                            <input type="text" name="tlp" id="inputTlp" class="form-control"
                                                placeholder="No Telephone">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="btnEditClose">Batal</button>
                        <button type="button" class="btn btn-primary" id="btnEditSimpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal edit --}}
    </div>
</div>
@endsection

@push('ajax_crud')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    $('#btnCreateSimpan').on('click', function() {
            $.ajax({
                type: "POST",
                url: "{{ url('api/outlet') }}",
                data: {
                    'nama': $('#modal-create').find('#inputNama').val(),
                    'alamat': $('#modal-create').find('#inputAlamat').val(),
                    'tlp': $('#modal-create').find('#inputTlp').val(),
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    getOutlet();
                    $('#btnCreateClose').click()
                    $('#modal-create').find('#inputNama').val(''),
                    $('#modal-create').find('#inputAlamat').val('')
                    $('#modal-create').find('#inputTlp').val('')
                }
            });
        })

        $(document).on('click', '#btn-modal-edit', function() {
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{url('api/outlet')}}/" + id,
                success: function (response) {
                    $('#modal-edit').find('#inputNama').val(response.data.nama)
                    $('#modal-edit').find('#inputAlamat').val(response.data.alamat)
                    $('#modal-edit').find('#inputTlp').val(response.data.tlp)
                    $('#btnEditSimpan').on('click', function () {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('api/outlet') }}/" + id,
                            data: {
                                'nama': $('#modal-edit').find('#inputNama').val(),
                                'alamat': $('#modal-edit').find('#inputAlamat').val(),
                                'tlp': $('#modal-edit').find('#inputTlp').val(),
                                '_method': 'PUT',
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                id = null;
                                getOutlet();
                                $('#btnEditClose').click();
                            }
                        });
                    })
                    
                }
            });
        });

        $(document).on('click', '#btn-delete', function() {
            const id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{url('api/outlet')}}/"+ id,
                data: {
                    '_method': 'DELETE', 
                    '_token': '{{csrf_token()}}'
                },
                success: function (response) {
                    getOutlet();
                }
            });
        })

        function getOutlet() {
            $.ajax({
                type: "GET",
                url: "{{ url('api/outlet') }}",
                dataType: "JSON",
                success: function(response) {
                    let rows = '';
                    $.each(response.datas, function(idx, data) {
                        idx++
                        rows += 
                            '<tr>' +
                                '<td>' + idx + '</td>' +
                                '<td>' + data.nama + '</td>' +
                                '<td>' + data.alamat + '</td>' +
                                '<td>' + data.tlp + '</td>' +
                                '<td>' +
                                '<div class="d-flex">' +
                                    '<button type="button" id="btn-modal-edit" data-id="'+ data.id +'" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#modal-edit"><i class="fas fa-pencil-alt"></i></button>'+
                                    '<button class="btn btn-danger shadow btn-xs sharp" data-id="'+ data.id +'" id="btn-delete"><i class="fa fa-trash"></i></button>'+
                                '</div>' +
                                '</td>' +
                            '</tr>' ;
                    });
                    $('#table-outlet').html('');
                    $('#table-outlet').append(rows);
                }

            });
        }
</script>
@endpush