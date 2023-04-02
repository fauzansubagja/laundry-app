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
                class="btn btn-primary shadow btn-xs sharp me-1" item-bs-toggle="modal" item-bs-target="#modal-edit"
                onclick="edit({{ $item->id }})"><i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-danger shadow btn-xs sharp" item-id="{{ $item->id }}" id="btn-delete"
                onclick="destroy({{ $item->id }})"><i class="fa fa-trash"></i></button>
        </div>
    </td>
</tr>
@endforeach