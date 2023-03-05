@php $no = 1; @endphp
@foreach ($outlet as $data)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $data->nama }}</td>
    <td>{{ $data->alamat }}</td>
    <td>{{ $data->tlp }}</td>
    <td>{{ $data->jenis_kelamin }}</td>
    <td>
        <div class="d-flex">
            <button type="button" id="btn-modal-edit" data-id="{{$data->id}}"
                class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#modal-edit"><i
                    class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-danger shadow btn-xs sharp" data-id="{{ $data->id }}" id="btn-delete"><i
                    class="fa fa-trash"></i></button>
        </div>
    </td>
</tr>
@endforeach