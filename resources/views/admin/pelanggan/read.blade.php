@php $no = 1; @endphp
@foreach ($data as $item)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->alamat }}</td>
        <td>{{ $item->tlp }}</td>
        <td>{{ $item->jenis_kelamin }}</td>
        <td>
            <div class="d-flex">
                <button type="button" id="btn-modal-edit"
                    item-id="{{ $item->id }}"
                    class="btn btn-primary shadow btn-xs sharp me-1"
                    item-bs-toggle="modal" item-bs-target="#modal-edit"
                    onclick="edit({{ $item->id }})"><i
                        class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-danger shadow btn-xs sharp"
                    item-id="{{ $item->id }}" id="btn-delete"
                    onclick="destroy({{ $item->id }})"><i
                        class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>
@endforeach
